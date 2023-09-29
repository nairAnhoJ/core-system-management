<?php

namespace App\Livewire\Customers;

use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class EditCustomer extends Component {

    public $editModal = false;

    public $id;

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

    public function mount($id) {
        $this->id = $id;
    }

    public function edit($id) {
        $this->resetErrorBag();
        $this->resetValidation();

        $result = Customer::where('id', $id)->first();
        $this->name = $result->name;
        $this->address = $result->address;
        $this->area = $result->area;
        $this->cp1_name = $result->cp1_name;
        $this->cp1_number = $result->cp1_number;
        $this->cp1_email = $result->cp1_email;
        $this->cp2_name = $result->cp2_name;
        $this->cp2_number = $result->cp2_number;
        $this->cp2_email = $result->cp2_email;
        $this->cp3_name = $result->cp3_name;
        $this->cp3_number = $result->cp3_number;
        $this->cp3_email = $result->cp3_email;

        $this->id = $id;
        $this->editModal = true;
    }

    public function update() {
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
            $this->editModal = true;
            $this->validate();
            return;
        }

        $result = Customer::where('id', $this->id)->first();
        $result->name = strtoupper($this->name);
        $result->address = strtoupper($this->address);
        $result->area = strtoupper($this->area);

        $result->cp1_name = strtoupper($this->cp1_name);
        $result->cp1_number = $this->cp1_number;
        $result->cp1_email = $this->cp1_email;

        $result->cp2_name = strtoupper($this->cp2_name);
        $result->cp2_number = $this->cp2_number;
        $result->cp2_email = $this->cp2_email;

        $result->cp3_name = strtoupper($this->cp3_name);
        $result->cp3_number = $this->cp3_number;
        $result->cp3_email = $this->cp3_email;
        $result->save();

        $this->editModal = false;

        $this->reset(['name']);

        $this->dispatch('customer-updated');

        request()->session()->flash('success', 'Customer Updated Successfully!');
    }

    public function cancel() {
        $this->editModal = false;
    }

    public function render() {
        return view('livewire.customers.edit-customer');
    }
}
