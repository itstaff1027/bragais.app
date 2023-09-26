<?php

namespace App\Livewire\Inventory;

use Livewire\Component;
use App\Models\Products;

class Displays extends Component
{
    public function render()
    {
        return view('livewire.inventory.displays', [
            'products' => Products::where('display_stocks', '>=', 1)->Paginate(25)
        ]);
    }
}
