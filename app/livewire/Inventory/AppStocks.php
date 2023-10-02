<?php

namespace App\Livewire\Inventory;

use Livewire\Attributes\Rule;
use Livewire\Component;
use App\Models\Products;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class AppStocks extends Component
{
    use WithPagination;
    
    #[Rule('required')]
    public $product_id;
    #[Rule('required')]
    public $stocks;
    #[Rule('required')]
    public $remarks = '';
    public function mount($id){
        $this->product_id = $id;
    }

    public function postStocks(){

        $this->validate();
        
        DB::table('stock_logs')->insert([
            'product_id' => $this->product_id,
            'stocks' => $this->stocks,
            'remarks' => $this->remarks,
            'status' => 'INCOMING'
        ]);

        $this->reset(['stocks']);

        return redirect('/inventory')->with('success', 'Successfully Addedd!');
    }
    public function render()
    {
    
        return view('livewire.inventory.app-stocks', [
            'get_stock' => Products::where('id', '=', $this->product_id)->first()
        ]);
    }
}
