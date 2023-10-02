<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Model') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form wire:submit.prevent="update" class="w-full flex flex-col justify-center items-center">
                            @csrf
                            <table class="w-full">
                                <caption class="text-4xl border-b-2 border-pink-700">
                                    <b>Details - {{ $products->id }}</b>
                                </caption>
                                <thead class="text-4xl border-b-2 border-pink-700">
                                    <tr>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="text-xl odd:bg-slate-200">
                                    <tr>
                                        <td><b>Product SKU:</b> <input type="text" wire:model="product_sku"
                                                class="bg-slate-200 hover:bg-white"
                                                value="{{ $products->product_sku }}" />
                                            @if($errors->any() && $errors->has('product_sku'))
                                            <span class="error text-red-600">{{ $errors->first('product_sku') }}</span>
                                            @endif
                                        </td>
                                        <td><b>Category:</b> <input type="text" wire:model="category"
                                                class="bg-slate-200 hover:bg-white" value="{{ $products->category }}" />
                                            @if($errors->any() && $errors->has('category'))
                                            <span class="error text-red-600">{{ $errors->first('category') }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Model:</b> <input type="text" wire:model="model"
                                                class="bg-slate-200 hover:bg-white" value="{{ $products->model }}" />
                                            @if($errors->any() && $errors->has('model'))
                                            <span class="error text-red-600">{{ $errors->first('model') }}</span>
                                            @endif
                                        </td>
                                        <td><b>Size:</b> <input type="number" wire:model="size"
                                                class="bg-slate-200 hover:bg-white" value="{{ $products->size }}" />
                                            @if($errors->any() && $errors->has('size'))
                                            <span class="error text-red-600">{{ $errors->first('size') }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Color:</b> <input type="text" wire:model="color"
                                                class="bg-slate-200 hover:bg-white" value="{{ $products->color }}" />
                                            @if($errors->any() && $errors->has('color'))
                                            <span class="error text-red-600">{{ $errors->first('color') }}</span>
                                            @endif
                                        </td>
                                        <td><b>Heel Height:</b> <input type="number" wire:model="heel_height"
                                                class="bg-slate-200 hover:bg-white"
                                                value="{{ $products->heel_height }}" />
                                            @if($errors->any() && $errors->has('heel_height'))
                                            <span class="error text-red-600">{{ $errors->first('heel_height') }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Stock:</b> {{ $products->total_stocks }}</td>
                                        <td><b>Price:</b> <input type="number" wire:model="price"
                                                class="bg-slate-200 hover:bg-white" value="{{ $products->price }}" />
                                            @if($errors->any() && $errors->has('price'))
                                            <span class="error text-red-600">{{ $errors->first('price') }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div>
                                <button type="submit"
                                    class="w-full p-2 pl-4 pr-4 bg-emerald-600 text-white rounded-full">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</div>