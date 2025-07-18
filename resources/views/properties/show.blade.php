<x-app-layout>
    <div class="flex flex-col gap-4 mb-8">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-gray-800">
                {{ __('Property Details') }}
            </h2>
            <div class="flex space-x-3">
                <a href="{{ route('properties.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md text-sm font-medium bg-blue-600 hover:bg-blue-700 text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back
                </a>
                <a href="{{ route('properties.edit', $property) }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md text-sm font-medium bg-green-600 hover:bg-green-700 text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200">
                    <i class="fas fa-edit mr-2"></i>
                    Edit
                </a>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                <i class="fas fa-tag mr-2"></i>
                {{ $property->propertyType->name ?? 'N/A' }}
            </span>
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium @if($property->status === 'active') bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif">
                <i class="fas fa-circle mr-2 text-sm"></i>
                {{ ucfirst($property->status) }}
            </span>
        </div>
    </div>

    <!-- Property Images Gallery -->
    <div class="mb-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($property->photos as $photo)
            <div class="relative group">
                <img src="{{ asset('storage/' . $photo->file_path) }}" alt="{{ $property->title }}" class="w-full h-48 object-cover rounded-lg transition-transform duration-300 group-hover:scale-105 shadow-lg">
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-opacity duration-300"></div>
                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <a href="{{ asset('storage/' . $photo->file_path) }}" class="text-white text-xl" target="_blank">
                        <i class="fas fa-search-plus"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Main Content (80%) -->
    <div class="flex flex-col lg:flex-row gap-6">
        <!-- Left Side (80%) -->
        <div class="leftside w-full lg:w-4/5 pr-0 lg:pr-8">


            <!-- Property Details Card -->
            <div class="bg-white overflow-hidden sm:rounded-lg mb-8">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Basic Information</h3>
                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <i class="fas fa-home text-gray-400 mr-3"></i>
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-900">{{ $property->title }}</p>
                                        <p class="text-sm text-gray-500">{{ $property->address }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-tag text-gray-400 mr-3"></i>
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-900">{{ $property->currency }} {{ number_format($property->price) }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-clock text-gray-400 mr-3"></i>
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-900">{{ $property->created_at->format('M d, Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Property Features</h3>
                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <i class="fas fa-bed text-gray-400 mr-3"></i>
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-900">{{ $property->bedrooms }} Bedrooms</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-bath text-gray-400 mr-3"></i>
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-900">{{ $property->bathrooms }} Bathrooms</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-ruler-combined text-gray-400 mr-3"></i>
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-900">{{ $property->square_feet }} sq ft</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-ruler text-gray-400 mr-3"></i>
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-900">{{ $property->lot_size }} lot size</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-calendar text-gray-400 mr-3"></i>
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-900">Built: {{ $property->year_built }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description Card -->
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Property Description</h3>
                    <div class="prose max-w-none text-gray-700">
                        {!! nl2br(e($property->description)) !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side (20%) -->
        <div class="rightside w-72">
            <!-- Features Card -->
            @if($property->features->isNotEmpty())
            <div class="bg-white overflow-hidden sm:rounded-lg mb-8">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-4">Additional Features</h3>
                    <div class="space-y-4">
                        @foreach($property->features as $feature)
                        <div class="flex items-center">
                            <div class="w-8">
                                <i class="fas fa-check-circle text-green-600 text-xl"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ $feature->name }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            <!-- Amenities Card -->
            @if($property->amenities->isNotEmpty())
            <div class="bg-white overflow-hidden sm:rounded-lg mb-8">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-4">Amenities</h3>
                    <div class="space-y-4">
                        @foreach($property->amenities as $amenity)
                        <div class="flex items-center">
                            <div class="w-8">
                                <i class="fas fa-check-circle text-blue-500 text-xl"></i>
                            </div>
                            <div>
                                <p class="text-sm">{{ $amenity->name }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>


</x-app-layout>

