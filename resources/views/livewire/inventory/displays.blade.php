<x-inventory-layout>
    <div>
        <table class="table-auto w-full text-center divide-y-2 divide-violet-400 hover:divide-pink-400">
            <caption>
                <h1 class="italic text-xl font-bold p-2">With Display Stocks</h1>
                <input class="w-full" />
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
                    <th>Display Stocks</th>
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
                    <td>{{ $product->display_stocks }}</td>
                    <td>
                        <button>+</button>
                        <button>U</button>
                        <button>x</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="p-3">
            {{ $products->links() }}
        </div>

    </div>
</x-inventory-layout>