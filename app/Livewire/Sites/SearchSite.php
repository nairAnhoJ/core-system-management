<?php

namespace App\Livewire\Sites;

use Livewire\Component;
use Livewire\Attributes\Url;

class SearchSite extends Component {

    #[Url()]
    public $search;

    public function updatedSearch() {
        $this->dispatch('site-search', $this->search);
    }

    public function render() {
        return view('livewire.sites.search-site');
    }
}
