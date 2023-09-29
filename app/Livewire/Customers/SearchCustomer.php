<?php

namespace App\Livewire\Customers;

use Livewire\Attributes\Url;
use Livewire\Component;

class SearchCustomer extends Component {

    #[Url()]
    public $search;

    public function updatedSearch() {
        $this->dispatch('customer-search', $this->search);
    }

    public function render() {
        return view('livewire.customers.search-customer');
    }
}
