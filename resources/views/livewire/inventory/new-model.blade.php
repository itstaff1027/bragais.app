<x-inventory-layout>
    @php
    $customerInputList = [
    ['type' => 'text', 'wire_model' => 'product_sku', 'placeholder' => 'Product SKU', 'error' => 'error'],
    ['type' => 'text', 'wire_model' => 'model', 'placeholder' => 'Model', 'error' => 'error'],
    ['type' => 'text', 'wire_model' => 'color', 'placeholder' => 'Color', 'error' => 'error'],
    ['type' => 'number', 'wire_model' => 'size', 'placeholder' => 'Size', 'error' => 'error'],
    ['type' => 'number', 'wire_model' => 'heel_height', 'placeholder' => 'Heel Height', 'error' => 'error'],
    ['type' => 'text', 'wire_model' => 'category', 'placeholder' => 'Category', 'error' => 'error'],
    ['type' => 'number', 'wire_model' => 'price', 'placeholder' => 'Price', 'error' => 'error'],
    ['type' => 'number', 'wire_model' => 'stocks', 'placeholder' => 'Stocks', 'error' => 'error'],
    ]
    @endphp
    <div class="flex justify-center items-center flex-col w-full border-2 border-teal-50">
        <h1 class="italic text-xl font-bold p-2">Add New Model</h1>
        <form class="flex justify-center items-center flex-col w-1/2 border-2 border-teal-50">
            @csrf
            {{-- NOT WORKING AT @error() --}}
            @foreach ($customerInputList as $input)
            <div class="flex-col p-3 w-full">
                <input type={{ $input['type'] }} class="p-2 w-full rounded-lg border-2 border-b-violet-800"
                    wire:model="{{ $input['wire_model'] }}" placeholder="{{ $input['placeholder'] }}">
                @if($errors->any() && $errors->has($input['wire_model']))
                <span class="error text-red-600">{{ $errors->first($input['wire_model']) }}</span>
                @endif
            </div>
            @endforeach
            <div class="flex-col p-3">
                <button type="submit" class="bg-teal-700 text-white p-2 rounded-full w-40">Add
                    Customer</button>
            </div>
        </form>
    </div>
</x-inventory-layout>