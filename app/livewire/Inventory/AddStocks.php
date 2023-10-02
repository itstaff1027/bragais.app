<?php

namespace App\Livewire\Inventory;

use Livewire\Component;
use App\Models\Products;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AddStocks extends Component
{
    use WithPagination;
    
    #[Rule('required')]
    public $product_id;

    #[Rule('required|integer|min:1')]
    public $stocks;

    #[Rule('required')]
    public $remarks = '';
    
    public function mount($id){
        $this->product_id = $id;
    }

    public function postStocks(){

        $this->validate();
        $user_id = Auth::id();
        DB::table('stock_logs')->insert([
            'user_id' => $user_id,
            'product_id' => $this->product_id,
            'stocks' => $this->stocks,
            'remarks' => $this->remarks,
            'status' => 'INCOMING',
            'action' => 'ADD'
        ]);

        $this->reset(['stocks']);

        return redirect('/inventory')->with('success', 'Successfully Addedd!');
    }
    public function render()
    {
    
        return view('livewire.inventory.add-stocks', [
            'get_stock' => Products::where('products.id', '=', $this->product_id)
            ->leftJoin(DB::raw('stock_logs'), 'products.id', '=', 'stock_logs.product_id') 
            ->select('products.id', 'products.product_sku', 'products.model', 'products.color', 'products.size', 'products.heel_height', 'products.category', 'products.price', 'products.order_from',
                          DB::raw('SUM(stock_logs.stocks) as total_stocks'))
            ->groupBy('products.id', 'products.product_sku', 'products.model', 'products.color', 'products.size', 'products.heel_height', 'products.category', 'products.price', 'products.order_from')          
            ->first()
        ]);
    }
}
