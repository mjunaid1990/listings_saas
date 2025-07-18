<div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4">
    @foreach($property->photos as $photo)
        <div wire:key="photo-{{ $photo->id }}" class="relative w-full h-48 rounded-lg overflow-hidden">
            <img src="{{ $photo->url }}" alt="Property photo" class="w-full h-full object-cover">
            <button wire:click="deletePhoto({{ $photo->id }})" class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
            </button>
        </div>
    @endforeach
</div>
