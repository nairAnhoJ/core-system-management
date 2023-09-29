<?php

namespace App\Livewire\Customers;

use App\Models\Customer;
use Livewire\Component;

class DeleteCustomer extends Component {
    public $id;
    public $deleteModal = false;

    public $deleteName;
    public $deleteAddress;
    public $deleteArea;

    public function mount($id) {
        $this->id = $id;
    }

    public function delete($id) {
        $result = Customer::where('id', $id)->first();

        $this->deleteName = $result->name;
        $this->deleteAddress = $result->address;
        $this->deleteArea = $result->area;

        $this->id = $id;
        $this->deleteModal = true;
    }

    public function destroy() {
        $result = Customer::where('id', $this->id)->first();
        $result->is_deleted = 1;
        $result->save();

        $this->deleteModal = false;

        $this->dispatch('customer-deleted');

        request()->session()->flash('success', 'Customer Deleted Successfully!');
    }

    public function cancel() {
        $this->deleteModal = false;
    }

    public function render() {
        return view('livewire.customers.delete-customer');
    }
}
