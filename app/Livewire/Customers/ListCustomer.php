<?php

namespace App\Livewire\Customers;

use App\Models\Customer;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class ListCustomer extends Component {

    use WithPagination;

    public $search;

    #[On('site-search')]
    public function updateSearch($search) {
        $this->search = $search;
        $this->resetPage();
    }

    #[On('site-created')]
    #[On('site-updated')]
    #[On('site-deleted')]
    public function render() {
        $results = Customer::where('is_deleted', 0)
            ->whereRaw("CONCAT_WS(' ', name, address, area) LIKE ?", ['%' . $this->search . '%'])
            ->orderBy('name')
            ->paginate(25);

        return view('livewire.customers.list-customer', compact('results'));
    }
}
