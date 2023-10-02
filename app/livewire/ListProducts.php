<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Products as ModelProducts;
use Livewire\WithPagination;

class ListProducts extends Component
{
    use WithPagination;

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

    #[Rule('required|max:15')] 
    public $stocks;

    // FILTERS - SEARCH
    public $product_sku_search = '';
    public $model_search = '';
    public $color_search = '';
    public $size_search = '';
    public $heel_search = '';
    public $category_search = '';

    public function store()
    {
        $this->validate();
        
        DB::table('products')->insert([
            'product_sku' => $this->product_sku,
            'model' => $this->model,
            'color' => $this->color,
            'size' => $this->size,
            'heel_height' => $this->heel_height,
            'category' => $this->category,
            'price' => $this->price,
            'stocks' => $this->stocks,
        ]);

        // Reset form input fields.
        $this->reset(['product_sku', 'model', 'color', 'size', 'heel_height', 'category', 'price', 'stocks']);
    }

    public function delete($id){
        $product = ModelProducts::find($id);

        if ($product) {
            $product->delete();
            return redirect()->back()->with('success', 'Product Deleted Successfully.');
        } else {
            return redirect()->back()->with('error', 'Product not Found.');
        }
    }

    public function render()
    {
        return view('livewire.list-products', [
            'products' => ModelProducts::where('products.product_sku', 'like', '%'.$this->product_sku_search.'%')
                ->where('products.model', 'like', '%'.$this->model_search.'%')
                ->where('products.color', 'like', '%'.$this->color_search.'%')
                ->where('products.size', 'like', '%'.$this->size_search.'%')
                ->where('products.heel_height', 'like', '%'.$this->heel_search.'%')
                ->where('products.category', 'like', '%'.$this->category_search.'%')
                ->leftJoin(DB::raw('(SELECT product_id, SUM(stocks) as total_stocks FROM stock_logs GROUP BY product_id) as stock_logs'), 'products.id', '=', 'stock_logs.product_id')
                ->leftJoin(DB::raw('(SELECT product_id, SUM(stocks) as total_outlet_stocks FROM outlet_logs GROUP BY product_id) as outlet_logs'), 'products.id', '=', 'outlet_logs.product_id')
                ->leftJoin(DB::raw('(SELECT product_id, SUM(stocks) as total_display_stocks FROM display_logs GROUP BY product_id) as display_logs'), 'products.id', '=', 'display_logs.product_id')
                ->select('products.id', 'products.product_sku', 'products.model', 'products.color', 'products.size', 'products.heel_height', 'products.category', 'products.price', 'products.order_from',
                          DB::raw('COALESCE(stock_logs.total_stocks, 0) as total_stocks'),
                          DB::raw('COALESCE(outlet_logs.total_outlet_stocks, 0) as total_outlet_stocks'),
                          DB::raw('COALESCE(display_logs.total_display_stocks, 0) as total_display_stocks'))
                ->groupBy('products.id', 'products.product_sku', 'products.model', 'products.color', 'products.size', 'products.heel_height', 'products.category', 'products.price', 'products.order_from', 'stock_logs.total_stocks', 'outlet_logs.total_outlet_stocks', 'display_logs.total_display_stocks')
                ->paginate(25)
        ]);
        
    }
}