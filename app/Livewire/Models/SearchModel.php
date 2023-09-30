<?php

namespace App\Livewire\Models;

use Livewire\Attributes\Url;
use Livewire\Component;

class SearchModel extends Component {

    #[Url()]
    public $search;

    public function updatedSearch() {
        $this->dispatch('model-search', $this->search);
    }

    public function render() {
        return view('livewire.models.search-model');
    }
}
