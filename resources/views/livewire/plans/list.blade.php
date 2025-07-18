<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subscription Plans') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-6">{{ __('Subscription Plans') }}</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($plans as $plan)
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">{{ $plan->name }}</h3>
                        <p class="text-3xl font-bold text-indigo-600 mb-4">{{ $plan->formatted_price }}</p>
                        
                        <ul class="space-y-2 mb-4">
                            @foreach($plan->features as $feature)
                                <li class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    {{ $feature }}
                                </li>
                            @endforeach
                        </ul>
                        
                        <a href="{{ route('subscriptions.create', ['plan' => $plan->id]) }}" 
                           class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Subscribe
                        </a>
                    </div>
                @endforeach
            </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
