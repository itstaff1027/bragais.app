<?php

namespace App\Livewire\Inventory;

use Livewire\Component;
use App\Models\Products;

class Outlets extends Component
{
    public function render()
    {
        return view('livewire.inventory.outlets', [
            'products' => Products::where('outlet_stocks', '>=', 1)->Paginate(25)
        ]);
    }
}
