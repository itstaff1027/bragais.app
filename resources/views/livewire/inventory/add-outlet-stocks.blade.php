<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add Outlet Stocks') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <table class="w-full">
                            <caption class="text-4xl border-b-2 border-pink-700">
                                <b>Details - {{ $get_stock->id }}</b>
                            </caption>
                            <thead class="text-4xl border-b-2 border-pink-700">
                                <tr>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="text-xl odd:bg-slate-200">
                                <tr>
                                    <td><b>Product SKU:</b> {{ $get_stock->product_sku }}</td>
                                    <td><b>Category:</b> {{ $get_stock->category }}</td>
                                </tr>
                                <tr>
                                    <td><b>Model:</b> {{ $get_stock->model }}</td>
                                    <td><b>Size:</b> {{ $get_stock->size }}</td>
                                </tr>
                                <tr>
                                    <td><b>Color:</b> {{ $get_stock->color }}</td>
                                    <td><b>Heel Height:</b> {{ $get_stock->heel_height }}</td>
                                </tr>
                                <tr>
                                    <td><b>Stock:</b> {{ $get_stock->total_outlet_stocks }}</td>
                                    <td><b>Price:</b> {{ $get_stock->price }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="flex justify-center items-center m-2 w-full">
                            <form wire:submit.prevent="postOutletStocks" class="w-1/2 flex justify-between">
                                @csrf
                                <table class="w-full">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><b>Stocks: </b></td>
                                            <td>
                                                <input type="number" wire:model="stocks"
                                                    class="w-full border-2 rounded-xl" placeholder="Stocks" />
                                                @if ($errors->any() && $errors->has('stocks'))
                                                <span class="error text-red-600">{{ $errors->first('stocks') }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Remarks: </b></td>
                                            <td>
                                                <textarea wire:model="remarks" class="w-full border-2 rounded-xl"
                                                    placeholder="Remarks"></textarea>
                                                @if ($errors->any() && $errors->has('remarks'))
                                                <span class="error text-red-600">{{ $errors->first('remarks')
                                                    }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <button type="submit"
                                                    class="w-full p-2 pl-4 pr-4 bg-emerald-600 text-white rounded-full">
                                                    ADD
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</div>