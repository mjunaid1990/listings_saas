<x-app-layout>
    
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-6">
        {{ __('Edit Property') }}
    </h2>

    <div class="content">
        <livewire:property.property-form :property="$property" />
    </div>
</x-app-layout>
