<div>
    <x-app-layout>
        <x-slot name="header">
            <div class="flex">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Display Stocks') }}
                </h2>
                @include('components.navigation.inventory.navigation')

            </div>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <table class="table-auto w-full text-center divide-y-2 divide-violet-400 hover:divide-pink-400">
                            <caption>
                                {{-- <div>
                                    <h1 class="italic text-xl font-bold p-2">
                                        On Stocks
                                    </h1>
                                </div> --}}

                                <div class="m-2" x-data="{ open: false }">
                                    <input class="border-2 border-violet-700 rounded-l-full w-1/2 p-2 m-0"
                                        wire:model.live.debounce.500ms='product_sku_search'
                                        placeholder="Search Stock [Product SKU]" />
                                    <button class="border-2 border-violet-700 rounded-r-full p-2 m-0"
                                        @click="open = ! open">Filter</button>
                                    {{-- FILTER --}}
                                    <div class="m-2" x-show="open" x-transition.duration.500ms>
                                        <input class="border-2 border-violet-700 rounded-full w-1/4 m-2"
                                            wire:model.live.debounce.500ms='model_search' placeholder="Model" />
                                        <input class="border-2 border-violet-700 rounded-full w-1/4 m-2"
                                            wire:model.live.debounce.500ms='color_search' placeholder="Color" />
                                        <input class="border-2 border-violet-700 rounded-full w-1/4 m-2"
                                            wire:model.live.debounce.500ms='size_search' placeholder="Size" />
                                        <input class="border-2 border-violet-700 rounded-full w-1/4 m-2"
                                            wire:model.live.debounce.500ms='heel_search' placeholder="Heel Height" />
                                        <input class="border-2 border-violet-700 rounded-full w-1/4 m-2"
                                            wire:model.live.debounce.500ms='category_search' placeholder="Category" />
                                    </div>

                                </div>
                            </caption>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product SKU</th>
                                    <th>Model</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Heel Height</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Stocks</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr class="hover:bg-violet-900 hover:text-white odd:bg-gray-200">
                                    <td class="p-2">{{ $product->id }}</td>
                                    <td>{{ $product->product_sku }}</td>
                                    <td>{{ $product->model }}</td>
                                    <td>{{ $product->color }}</td>
                                    <td>{{ $product->size }}</td>
                                    <td>{{ $product->heel_height }}</td>
                                    <td>{{ $product->category }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->total_display_stocks }}</td>
                                    <td>
                                        <a href="{{ route('add-display_stocks', ['id' => $product->id]) }}">
                                            <button>
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                    viewBox="0 0 448 512" class="fill-green-400">
                                                    <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->

                                                    <path
                                                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                                                </svg>
                                                {{-- {{ __('Add Stocks') }} --}}
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <div class="p-3">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</div>