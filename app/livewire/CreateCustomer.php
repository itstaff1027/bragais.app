<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class CreateCustomer extends Component
{
    use WithPagination;
    public $first_name;
    public $last_name;
    public $email;
    public $mobile_number;
    public $city_address;
    public $consent;

    protected $rules = [
        'first_name' => 'required|max:255',
        'last_name' => 'required|max:255',
        'email' => 'required|email|unique:customers,email',
        'mobile_number' => 'required|max:12',
        'city_address' => 'required|max:255',
        'consent' => 'required|max:3',
    ];

    public function store()
    {
        $this->validate();
        
        DB::table('customers')->insert([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'mobile_number' => $this->mobile_number,
            'city_address' => $this->city_address,
            'consent' => $this->consent,
        ]);

        // Reset form input fields.
        $this->reset(['first_name', 'last_name', 'email', 'mobile_number', 'city_address', 'consent']);
    }
    
    public function render()
    {
        return view('livewire.create-customer', [
            'customers' => Customer::Paginate(10)
        ]);
    }
}
