<?php

namespace App\Http\Livewire\Property;

use Livewire\Component;
use Intervention\Image\ImageManager as Image;
use Livewire\WithFileUploads;
use App\Models\Property;
use App\Models\PropertyPhoto;
use App\Models\PropertyType;
use App\Models\PropertyFeature;
use App\Models\PropertyAmenity;
use Auth;
use Illuminate\Support\Str;

class PropertyForm extends Component
{
    use WithFileUploads;

    public Property $property;

    public $photos = [];
    public $photoPreviews = [];
    public $existingPhotos = [];
    public $photosToDelete = []; // Track photos to delete
    public $title;
    public $description;
    public $price;
    public $address;
    public $latitude;
    public $longitude;
    public $status = 'active';
    public $currency = 'USD';
    public $bedrooms;
    public $bathrooms;
    public $square_feet;
    public $lot_size;
    public $year_built;
    public $stories;
    public $garage_spaces;
    public $hoa_fees;
    public $property_type_id;
    public $property_status = 'for_sale';
    public $selectedFeatures = [];
    public $selectedAmenities = [];
    public $propertyTypes;
    public $features;
    public $amenities;

    public $activeTab = 'basic';
    public $seo_title;
    public $seo_description;
    public $seo_keywords;

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }

    protected $listeners = ['editorReady'];

    protected function rules(): array
    {
        return [
            'title' => 'required|string|max:255|regex:/^[a-zA-Z0-9\s\.,\-_&!?()]+$/',
            'property_type_id' => 'required|exists:property_types,id',
            'property_status' => 'required|in:for_sale,for_rent',
            'description' => 'string|nullable|regex:/^[a-zA-Z0-9\s\.,\-_&!?()]+$/',
            'price' => 'numeric|min:0|nullable',
            'address' => 'string|max:255|nullable|regex:/^[a-zA-Z0-9\s\.,\-_&!?()]+$/',
            'latitude' => 'numeric|nullable',
            'longitude' => 'numeric|nullable',
            'currency' => 'in:USD,EUR,GBP|nullable',
            'bedrooms' => 'integer|min:0|nullable',
            'bathrooms' => 'integer|min:0|nullable',
            'square_feet' => 'integer|min:0|nullable',
            'lot_size' => 'integer|min:0|nullable',
            'year_built' => 'integer|min:1800|max:' . date('Y') . '|nullable',
            'stories' => 'integer|min:1|nullable',
            'garage_spaces' => 'integer|min:0|nullable',
            'hoa_fees' => 'numeric|min:0|nullable',
            'photos.*' => 'image|max:2048|nullable', // 2MB max per image
        ];
    }

    public function mount(Property $property = null)
    {
        $this->propertyTypes = PropertyType::all();
        $this->features = PropertyFeature::all();
        $this->amenities = PropertyAmenity::all();

        if ($property) {
            $this->property = $property;
            $this->title = $property->title;
            $this->description = $property->description;
            $this->price = $property->price;
            $this->address = $property->address;
            $this->latitude = $property->latitude;
            $this->longitude = $property->longitude;
            $this->status = $property->status;
            $this->currency = $property->currency;
            $this->bedrooms = $property->bedrooms;
            $this->bathrooms = $property->bathrooms;
            $this->square_feet = $property->square_feet;
            $this->lot_size = $property->lot_size;
            $this->year_built = $property->year_built;
            $this->stories = $property->stories;
            $this->garage_spaces = $property->garage_spaces;
            $this->hoa_fees = $property->hoa_fees;
            $this->property_type_id = $property->property_type_id;
            $this->property_status = $property->property_status;
            $this->selectedFeatures = $property->features->pluck('id')->toArray();
            $this->selectedAmenities = $property->amenities->pluck('id')->toArray();
            
            // Load existing photos
            $this->existingPhotos = $property->photos;
        }
    }

    public function updatedPhotos($value)
    {
        // Clear existing photos and previews
        $this->photos = collect($value); // Convert to collection
        $this->photoPreviews = collect();
        
        // Handle file upload validation and create previews
        if ($value) {
            foreach ($this->photos as $photo) {
                if ($photo->getSize() > 2048 * 1024) { // 2MB
                    $this->addError('photos', 'Image size must be less than 2MB');
                    return;
                }
                
                // Create preview URL
                $previewUrl = $photo->temporaryUrl();
                $this->photoPreviews->put($previewUrl, $previewUrl);
            }
        }
    }

    public function removePhoto($previewUrl)
    {
        // Log the preview URL
        \Log::info('Attempting to remove photo with URL: ' . $previewUrl);
        
        // Emit event to confirm the click
        $this->dispatch('photo-remove-attempt', ['url' => $previewUrl]);
        
        // Remove from photos
        $this->photos = $this->photos->filter(function($photo) use ($previewUrl) {
            return $photo->temporaryUrl() !== $previewUrl;
        });
        
        // Remove from previews
        $this->photoPreviews->forget($previewUrl);
        
        // Emit event to confirm removal
        $this->dispatch('photo-removed', ['url' => $previewUrl]);
    }

    public function markPhotoForDeletion($photoId)
    {
        if (empty($photoId)) {
            return;
        }
        
        $this->existingPhotos = $this->existingPhotos->filter(function($photo) use ($photoId) {
            return $photo->id !== $photoId;
        });
        
        $this->photosToDelete[] = $photoId;
        
        $this->dispatch('photo-deletion-marked', ['photoId' => $photoId]);
    }

    public function save()
    {
        try {
            $this->validate();

            // Save property first
            if ($this->property && $this->property->id) {

                
                // Delete marked photos first
                if (!empty($this->photosToDelete)) {
                    PropertyPhoto::whereIn('id', $this->photosToDelete)->delete();
                    $this->photosToDelete = []; // Reset after deletion
                }
                
                $this->property->update([
                    'title' => $this->title,
                    'description' => $this->description,
                    'price' => $this->price,
                    'address' => $this->address,
                    'latitude' => $this->latitude,
                    'longitude' => $this->longitude,
                    'status' => $this->status,
                    'currency' => $this->currency,
                    'bedrooms' => $this->bedrooms,
                    'bathrooms' => $this->bathrooms,
                    'square_feet' => $this->square_feet,
                    'lot_size' => $this->lot_size,
                    'year_built' => $this->year_built,
                    'stories' => $this->stories,
                    'garage_spaces' => $this->garage_spaces,
                    'hoa_fees' => $this->hoa_fees,
                    'property_type_id' => $this->property_type_id,
                    'property_status' => $this->property_status,
                ]);
            } else {
                $this->property = Property::create([
                    'user_id' => auth()->id(),
                    'title' => $this->title,
                    'description' => $this->description,
                    'price' => $this->price,
                    'address' => $this->address,
                    'latitude' => $this->latitude,
                    'longitude' => $this->longitude,
                    'status' => $this->status,
                    'currency' => $this->currency,
                    'bedrooms' => $this->bedrooms,
                    'bathrooms' => $this->bathrooms,
                    'square_feet' => $this->square_feet,
                    'lot_size' => $this->lot_size,
                    'year_built' => $this->year_built,
                    'stories' => $this->stories,
                    'garage_spaces' => $this->garage_spaces,
                    'hoa_fees' => $this->hoa_fees,
                    'property_type_id' => $this->property_type_id,
                    'property_status' => $this->property_status,
                ]);
            }

            // Sync features and amenities
            $this->property->features()->sync($this->selectedFeatures);
            $this->property->amenities()->sync($this->selectedAmenities);

            // Handle new photos
            if ($this->photos) {
                $this->property->save(); // Ensure we have an ID
                foreach ($this->photos as $photo) {
                    try {
                        // Optimize image before storing
                        $image = (new Image())->make($photo->getRealPath());
                        $image->orientate();
                        $image->resize(null, 1920, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        });
                        // Convert to WebP with 80% quality
                        $image->encode('webp', 80);
                        
                        // Generate unique filename using timestamp and random string
                        $timestamp = now()->format('Y-m-d_H-i-s');
                        $random = Str::random(8);
                        $extension = 'webp';
                        $path = 'properties/' . $timestamp . '_' . $random . '.' . $extension;
                        
                        // Store optimized WebP image directly to storage
                        $image->save(storage_path('app/public/' . $path));
                        PropertyPhoto::create([
                            'property_id' => $this->property->id,
                            'file_path' => $path
                        ]);
                    } catch (\Exception $e) {
                        \Log::error('Failed to upload photo: ' . $e->getMessage());
                        $this->addError('photos', 'Failed to upload one or more photos');
                    }
                }
            }

            session()->flash('success', 'Property saved successfully!');
            
            // Only redirect after all operations are complete
            return redirect()->route('properties.index');
        } catch (\Exception $e) {
            \Log::error('Property save failed: ' . $e->getMessage());
            $this->addError('property', 'Failed to save property. Please try again.');
            return redirect()->back()->withInput();
        }
    }

    public function render()
    {
        return view('livewire.property.form');
    }

}
