<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Products as ModelProducts;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

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

    public function render()
    {
        return view('livewire.products', [
            'products' => ModelProducts::Paginate(25)
        ]);
    }
    
}
