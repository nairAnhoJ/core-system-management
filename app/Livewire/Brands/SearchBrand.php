<?php

namespace App\Livewire\Brands;

use Livewire\Attributes\Url;
use Livewire\Component;

class SearchBrand extends Component {

    #[Url()]
    public $search;

    public function updatedSearch() {
        $this->dispatch('brand-search', $this->search);
    }

    public function render() {
        return view('livewire.brands.search-brand');
    }
}
