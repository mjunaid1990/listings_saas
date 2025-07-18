<div class="max-w-md mx-auto p-6 bg-white rounded-lg shadow">
    <form wire:submit.prevent="subscribe">
        @if($error)
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                {{ $error }}
            </div>
        @endif

        <div class="space-y-6">
            <div>
                <label for="cardNumber" class="block text-sm font-medium text-gray-700">Card Number</label>
                <input type="text" id="cardNumber" wire:model="cardNumber" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @error('cardNumber') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label for="cardExpiry" class="block text-sm font-medium text-gray-700">Expiry Date</label>
                    <input type="text" id="cardExpiry" wire:model="cardExpiry" placeholder="MM/YYYY" 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @error('cardExpiry') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="cardCvc" class="block text-sm font-medium text-gray-700">CVC</label>
                    <input type="text" id="cardCvc" wire:model="cardCvc" 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @error('cardCvc') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mt-8">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Subscribe to {{ $plan->name }}
                </button>
            </div>
        </div>
    </form>
</div>
