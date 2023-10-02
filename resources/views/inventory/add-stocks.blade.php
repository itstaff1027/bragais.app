<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Stocks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="w-full">
                        <caption class="text-4xl border-b-2 border-pink-700">
                            Details <input type="number" wire:model="product_id" value="{{ $stocks->id }}" disabled />
                        </caption>
                        <thead class="text-4xl border-b-2 border-pink-700">
                            <tr>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="text-xl odd:bg-slate-200">
                            <tr>
                                <td><b>Product SKU:</b> {{ $stocks->product_sku }}</td>
                                <td><b>Category:</b> {{ $stocks->category }}</td>
                            </tr>
                            <tr>
                                <td><b>Model:</b> {{ $stocks->model }}</td>
                                <td><b>Color:</b> {{ $stocks->color }}</td>
                            </tr>
                            <tr>
                                <td><b>Size:</b> {{ $stocks->size }}</td>
                                <td><b>Heel Height:</b> {{ $stocks->heel_height }}</td>
                            </tr>
                            <tr>
                                <td><b>Price:</b> {{ $stocks->price }}</td>
                                <td><b>Stocks:</b> {{ $stocks->stocks }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="flex flex-col justify-center items-center m-2">
                        <form wire:model.prevent="postStocks">
                            <input type="number" wire:model="stocks"
                                class="w-1/2 m-2 p-2 border-2 border-violet-700 rounded-full"
                                placeholder="1, 2, 3 ..." />
                            @error('stocks')<span class="error text-red-600">{{ $message }}</span> @enderror
                            <button class="p-2 pl-4 pr-4 bg-emerald-600 text-white rounded-full">
                                SUBMIT
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>