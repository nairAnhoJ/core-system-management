<?php

namespace App\Livewire\Brands;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class ListBrand extends Component {

    use WithPagination;

    public $search;

    #[On('brand-search')]
    public function updateSearch($search) {
        $this->search = $search;
        $this->resetPage();
    }

    #[On('brand-created')]
    #[On('brand-updated')]
    #[On('brand-deleted')]
    public function render() {
        $results = Brand::where('is_deleted', 0)
            ->whereRaw("CONCAT_WS(' ', name) LIKE ?", ['%' . $this->search . '%'])
            ->orderBy('name')
            ->paginate(25);

        return view('livewire.brands.list-brand', compact('results'));
    }
}
