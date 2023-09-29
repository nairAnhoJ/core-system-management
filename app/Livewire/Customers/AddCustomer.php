<?php

namespace App\Livewire\Customers;

use App\Models\Customer;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AddCustomer extends Component {

    public $addModal = false;

    public $name;
    public $address;
    public $area;

    public $cp1_name;
    public $cp1_number;
    public $cp1_email;

    public $cp2_name;
    public $cp2_number;
    public $cp2_email;

    public $cp3_name;
    public $cp3_number;
    public $cp3_email;

    public function rules() {
        return [
            'name' => 'required',
            'address' => 'required',
            'area' => 'required',
        ];
    }

    public function add() {
        $this->reset(['name', 'address', 'area', 'cp1_name', 'cp1_number', 'cp1_email', 'cp2_name', 'cp2_number', 'cp2_email', 'cp3_name', 'cp3_number', 'cp3_email']);
        $this->resetErrorBag();
        $this->resetValidation();
        $this->addModal = true;
    }

    public function store() {
        $validator = Validator::make(
            [
                'name' => $this->name,
                'address' => $this->address,
                'area' => $this->area,
            ],
            [
                'name' => 'required',
                'address' => 'required',
                'area' => 'required',
            ]
        );

        if ($validator->fails()) {
            $this->addModal = true;
            $this->validate();
            return;
        }

        $new = new Customer();
        $new->name = strtoupper($this->name);
        $new->address = strtoupper($this->address);
        $new->area = strtoupper($this->area);

        $new->cp1_name = strtoupper($this->cp1_name);
        $new->cp1_number = $this->cp1_number;
        $new->cp1_email = $this->cp1_email;

        $new->cp2_name = strtoupper($this->cp2_name);
        $new->cp2_number = $this->cp2_number;
        $new->cp2_email = $this->cp2_email;

        $new->cp3_name = strtoupper($this->cp3_name);
        $new->cp3_number = $this->cp3_number;
        $new->cp3_email = $this->cp3_email;
        $new->key = Str::uuid()->toString();
        $new->save();

        $this->addModal = false;

        $this->reset(['name', 'address', 'area', 'cp1_name', 'cp1_number', 'cp1_email', 'cp2_name', 'cp2_number', 'cp2_email', 'cp3_name', 'cp3_number', 'cp3_email']);

        $this->dispatch('customer-created');

        request()->session()->flash('success', 'New Customer Created Successfully!');
    }

    public function cancel() {
        $this->addModal = false;
    }

    public function render() {
        return view('livewire.customers.add-customer');
    }
}
