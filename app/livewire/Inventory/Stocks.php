<?php

namespace App\Livewire\Inventory;
use App\Models\Products;
use Livewire\Component;

class Stocks extends Component
{
    public function render()
    {
        return view('livewire.inventory.stocks', [
            'products' => Products::where('stocks', '>=', 1)->Paginate(25)
        ]);
    }
}
