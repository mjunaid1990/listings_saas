<div class="mx-auto p-6 bg-white rounded-lg shadow">
    <form wire:submit.prevent="save">
        <!-- Tab Navigation -->
        <div class="border-b border-gray-200 mb-6">
            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                <button wire:click.prevent="setActiveTab('basic')" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm {{ $activeTab === 'basic' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}" aria-current="{{ $activeTab === 'basic' ? 'page' : 'false' }}">
                    Basic Info
                </button>
                <button wire:click.prevent="setActiveTab('location')" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm {{ $activeTab === 'location' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}" aria-current="{{ $activeTab === 'location' ? 'page' : 'false' }}">
                    Location
                </button>
                <button wire:click.prevent="setActiveTab('features')" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm {{ $activeTab === 'features' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}" aria-current="{{ $activeTab === 'features' ? 'page' : 'false' }}">
                    Features
                </button>
                <button wire:click.prevent="setActiveTab('photos')" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm {{ $activeTab === 'photos' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}" aria-current="{{ $activeTab === 'photos' ? 'page' : 'false' }}">
                    Photos
                </button>
                <button wire:click.prevent="setActiveTab('seo')" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm {{ $activeTab === 'seo' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}" aria-current="{{ $activeTab === 'seo' ? 'page' : 'false' }}">
                    SEO
                </button>
            </nav>
        </div>

        <!-- Tab Content -->
        <div class="space-y-6">
            <!-- Basic Info Tab -->
            <div class="{{ $activeTab === 'basic' ? 'block' : 'hidden' }}">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" id="title" wire:model="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="property_type_id" class="block text-sm font-medium text-gray-700">Property Type</label>
                        <select id="property_type_id" wire:model="property_type_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">Select Property Type</option>
                            @foreach($propertyTypes as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                        @error('property_type_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                        <input type="number" step="0.01" id="price" wire:model="price" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @error('price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="currency" class="block text-sm font-medium text-gray-700">Currency</label>
                        <select id="currency" wire:model="currency" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="USD">USD</option>
                            <option value="EUR">EUR</option>
                            <option value="GBP">GBP</option>
                        </select>
                        @error('currency') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    

                    
                </div>

                <div wire:ignore class="mt-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" wire:model="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 summernote"></textarea>
                    @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700">Featured</label>
                    <div class="mt-2">
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" id="featured" wire:model="featured" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <span class="text-sm text-gray-700">Mark as Featured Property</span>
                        </label>
                    </div>
                </div>

                <div class="mt-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="status" wire:model="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

            </div>

            <!-- Location Tab -->
            <div class="{{ $activeTab === 'location' ? 'block' : 'hidden' }}">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <input type="text" id="address" wire:model="address" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="latitude" class="block text-sm font-medium text-gray-700">Latitude</label>
                            <input type="number" step="0.000001" id="latitude" wire:model="latitude" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('latitude') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="longitude" class="block text-sm font-medium text-gray-700">Longitude</label>
                            <input type="number" step="0.000001" id="longitude" wire:model="longitude" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('longitude') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features Tab -->
            <div class="{{ $activeTab === 'features' ? 'block' : 'hidden' }}">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="bedrooms" class="block text-sm font-medium text-gray-700">Bedrooms</label>
                        <input type="number" id="bedrooms" wire:model="bedrooms" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @error('bedrooms') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="bathrooms" class="block text-sm font-medium text-gray-700">Bathrooms</label>
                        <input type="number" id="bathrooms" wire:model="bathrooms" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @error('bathrooms') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="square_feet" class="block text-sm font-medium text-gray-700">Square Feet</label>
                        <input type="number" id="square_feet" wire:model="square_feet" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @error('square_feet') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="lot_size" class="block text-sm font-medium text-gray-700">Lot Size (sq ft)</label>
                        <input type="number" id="lot_size" wire:model="lot_size" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @error('lot_size') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="year_built" class="block text-sm font-medium text-gray-700">Year Built</label>
                        <input type="number" id="year_built" wire:model="year_built" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @error('year_built') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="stories" class="block text-sm font-medium text-gray-700">Stories</label>
                        <input type="number" id="stories" wire:model="stories" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @error('stories') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="garage_spaces" class="block text-sm font-medium text-gray-700">Garage Spaces</label>
                        <input type="number" id="garage_spaces" wire:model="garage_spaces" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @error('garage_spaces') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="hoa_fees" class="block text-sm font-medium text-gray-700">HOA Fees</label>
                        <input type="number" id="hoa_fees" wire:model="hoa_fees" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @error('hoa_fees') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>



                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Amenities</label>
                        <div class="mt-2 space-y-2">
                            @foreach($amenities as $amenity)
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" id="amenity_{{ $amenity->id }}" wire:model="selectedAmenities" value="{{ $amenity->id }}" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <label for="amenity_{{ $amenity->id }}" class="text-sm text-gray-700">{{ $amenity->name }}</label>
                            </div>
                            @endforeach
                        </div>
                        @error('selectedAmenities') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Features</label>
                        <div class="mt-2 space-y-2">
                            @foreach($features as $feature)
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" id="feature_{{ $feature->id }}" wire:model="selectedFeatures" value="{{ $feature->id }}" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <label for="feature_{{ $feature->id }}" class="text-sm text-gray-700">{{ $feature->name }}</label>
                            </div>
                            @endforeach
                        </div>
                        @error('selectedFeatures') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

            </div>

            <!-- Photos Tab -->
            <div class="{{ $activeTab === 'photos' ? 'block' : 'hidden' }}">
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="photos" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                <span>Upload a file</span>
                                <input id="photos" name="photos" type="file" wire:model="photos" multiple class="sr-only">
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                    </div>
                </div>
                @error('photos.*') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <!-- Photo Previews -->
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-8 xl:grid-cols-6 2xl:grid-cols-12 gap-4 mb-4 mt-4">
                    <!-- New Photos -->
                    @foreach($photoPreviews as $index => $preview)
                    <div class="relative">
                        <img src="{{ $preview }}" alt="Preview" class="w-full h-32 object-cover rounded-md">
                        <button wire:click="removePhoto('{{ $preview }}')" class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-1" type="button">
                            <div class="flex items-center justify-center">
                                <div wire:loading wire:target="removePhoto('{{ $preview }}')" class="animate-spin">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                    </svg>
                                </div>
                                <div wire:loading.remove="removePhoto('{{ $preview }}')">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </div>
                            </div>
                        </button>
                    </div>
                    @endforeach

                    <!-- Existing Photos -->
                    @foreach($existingPhotos as $photo)
                    <div class="relative">
                        <img src="{{ $photo->getUrlAttribute() }}" alt="Existing Photo" class="w-full h-32 object-cover rounded-md">
                        <button wire:click="markPhotoForDeletion({{ $photo->id }})" class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-1" type="button">
                            <div class="flex items-center justify-center">
                                <div wire:loading wire:target="markPhotoForDeletion('{{ $photo->id }}')" class="animate-spin">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                    </svg>
                                </div>
                                <div wire:loading.remove="markPhotoForDeletion('{{ $photo->id }}')">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </div>
                            </div>
                        </button>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- SEO Tab -->
            <div class="{{ $activeTab === 'seo' ? 'block' : 'hidden' }}">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="seo_title" class="block text-sm font-medium text-gray-700">SEO Title</label>
                        <input type="text" id="seo_title" wire:model="seo_title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @error('seo_title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    

                    <div>
                        <label for="seo_keywords" class="block text-sm font-medium text-gray-700">SEO Keywords</label>
                        <input type="text" id="seo_keywords" wire:model="seo_keywords" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @error('seo_keywords') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="seo_description" class="block text-sm font-medium text-gray-700">SEO Description</label>
                        <textarea id="seo_description" wire:model="seo_description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                        @error('seo_description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                </div>
            </div>
        </div>

        <div class="mt-8">
            <button type="submit" wire:click.prevent="save" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
            </button>
        </div>
    </form>
</div>
@push('scripts')
<script>
    document.addEventListener('livewire:navigated', () => {
        // Handle photo deletion events
        Livewire.on('photo-deletion-marked', (data) => {
            console.log('Photo marked for deletion:', data.photoId);
            // Show success toast
            Swal.fire({
                icon: 'success'
                , title: 'Success'
                , text: 'Photo will be deleted when you save the property'
                , toast: true
                , position: 'top-end'
                , showConfirmButton: false
                , timer: 3000
                , timerProgressBar: true
                , customClass: {
                    popup: 'colored-toast'
                }
            });
        });

        // Handle photo removal events
        Livewire.on('photo-remove-attempt', (data) => {
            console.log('Attempting to remove photo:', data.url);
        });

        Livewire.on('photo-removed', (data) => {
            console.log('Photo removed:', data.url);
            // Show success toast
            Swal.fire({
                icon: 'success'
                , title: 'Success'
                , text: 'Photo removed successfully'
                , toast: true
                , position: 'top-end'
                , showConfirmButton: false
                , timer: 3000
                , timerProgressBar: true
                , customClass: {
                    popup: 'colored-toast'
                }
            });
        });

        $('#description').summernote({
            placeholder: 'Write your content here...'
            , tabsize: 2
            , height: 200
            , callbacks: {
                onChange: function(contents, $editable) {
                    @this.set('description', contents);
                }
            }
        });
        // Set content if editing
        $('#description').summernote('code', @this.get('description'));
    });

    Livewire.on('resetSummernote', () => {
        $('#description').summernote('reset');
    });

</script>
@endpush

