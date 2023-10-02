<?php

namespace App\Livewire\Inventory\Views;

use Livewire\Component;
use App\Models\Products;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\DB;

class Outlet extends Component
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
    public function render()
    {
        return view('livewire.inventory.views.outlet', [
            'products' => Products::where('products.product_sku', 'like', '%'.$this->product_sku_search.'%')
                ->where('products.model', 'like', '%'.$this->model_search.'%')
                ->where('products.color', 'like', '%'.$this->color_search.'%')
                ->where('products.size', 'like', '%'.$this->size_search.'%')
                ->where('products.heel_height', 'like', '%'.$this->heel_search.'%')
                ->where('products.category', 'like', '%'.$this->category_search.'%')
                ->where('outlet_logs.total_outlet_stocks', '>', 0)
                ->leftJoin(DB::raw('(SELECT product_id, SUM(stocks) as total_outlet_stocks FROM outlet_logs GROUP BY product_id) as outlet_logs'), 'products.id', '=', 'outlet_logs.product_id')
                ->select('products.id', 'products.product_sku', 'products.model', 'products.color', 'products.size', 'products.heel_height', 'products.category', 'products.price', 'products.order_from',
                          DB::raw('COALESCE(outlet_logs.total_outlet_stocks, 0) as total_outlet_stocks'))
                ->groupBy('products.id', 'products.product_sku', 'products.model', 'products.color', 'products.size', 'products.heel_height', 'products.category', 'products.price', 'products.order_from', 'outlet_logs.total_outlet_stocks')
                ->paginate(25)
        ]);
    }
}
