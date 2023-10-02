<?php

namespace App\Livewire\Inventory;

use Livewire\Component;
use App\Models\Products;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\DB;

class EditModel extends Component
{
    public $product_id;

    #[Rule('required|max:15')] 
    public $product_sku;

    #[Rule('required|max:15')] 
    public $model;

    #[Rule('required|max:15')] 
    public $color;

    #[Rule('required|max:15')] 
    public $size;

    #[Rule('required|max:15')] 
    public $heel_height;

    #[Rule('required|max:15')] 
    public $category;

    #[Rule('required|max:15')] 
    public $price;


    public function mount($id){
        $this->product_id = $id;
    }

    public function update(){

        $this->validate();

        $product = Products::find($this->product_id);

        $product->product_sku = $this->product_sku;
        $product->model = $this->model;
        $product->color = $this->color;
        $product->size = $this->size;
        $product->heel_height = $this->heel_height;
        $product->category = $this->category;
        $product->price = $this->price;

        $product->save();

        $this->reset(['product_sku', 'model', 'color', 'size', 'heel_height', 'category', 'price']);

        return redirect('/inventory');
    }


    public function render()
    {
        $products = Products::where('products.id', '=', $this->product_id)
        ->leftJoin(DB::raw('stock_logs'), 'products.id', '=', 'stock_logs.product_id') 
        ->select('products.id', 'products.product_sku', 'products.model', 'products.color', 'products.size', 'products.heel_height', 'products.category', 'products.price', 'products.order_from',
                      DB::raw('SUM(stock_logs.stocks) as total_stocks'))
        ->groupBy('products.id', 'products.product_sku', 'products.model', 'products.color', 'products.size', 'products.heel_height', 'products.category', 'products.price', 'products.order_from')          
        ->first();

        $this->product_sku = $products->product_sku;
        $this->model = $products->model;
        $this->color = $products->color;
        $this->size = $products->size;
        $this->heel_height = $products->heel_height;
        $this->category = $products->category;
        $this->price = $products->price;

        return view('livewire.inventory.edit-model', [
            'products' => $products
        ]);
    }
}
