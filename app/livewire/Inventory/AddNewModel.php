<?php

namespace App\Livewire\Inventory;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AddNewModel extends Component
{

    #[Rule('required')] 
    public $product_sku;

    #[Rule('required')] 
    public $model;

    #[Rule('required')] 
    public $color;

    #[Rule('required')] 
    public $size;

    #[Rule('required')] 
    public $heel_height;

    #[Rule('required')] 
    public $category;

    #[Rule('required')] 
    public $price;

    #[Rule('required')] 
    public $stocks;

    public function store(){
        $this->validate();
        $user_id = Auth::id();
        $lastInsertId = DB::table('products')->insertGetId([
            'product_sku' => $this->product_sku,
            'model' => $this->model,
            'color' => $this->color,
            'size' => $this->size,
            'heel_height' => $this->heel_height,
            'category' => $this->category,
            'price' => $this->price,
            'stocks' => $this->stocks,
            'order_From' => 'STOCK',
            'BatchNo'=> 'NULL'
        ]);

        if($this->stocks || $this->stocks == 0){
            DB::table('stock_logs')->insert([
                'user_id' => $user_id,
                'product_id' => $lastInsertId,
                'stocks' => $this->stocks,
                'remarks' => 'ADDED',
                'status' => 'INCOMING',
                'action' => 'ADD'
            ]);
        }

        // Reset form input fields.
        $this->reset(['product_sku', 'model', 'color', 'size', 'heel_height', 'category', 'price', 'stocks']);
        return redirect('/inventory')->with('success', 'Successfully Added');
    }

    public function render()
    {
        return view('livewire.inventory.add-new-model');
    }
}
