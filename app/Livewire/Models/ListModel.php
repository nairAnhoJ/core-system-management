<?php

namespace App\Livewire\Models;

use App\Models\FLModel;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class ListModel extends Component {

    use WithPagination;

    public $search;

    #[On('model-search')]
    public function updateSearch($search) {
        $this->search = $search;
        $this->resetPage();
    }

    #[On('model-created')]
    #[On('model-updated')]
    #[On('model-deleted')]
    public function render() {
        $results = FLModel::with('brand')
            ->where('is_deleted', 0)
            ->whereRaw("CONCAT_WS(' ', name) LIKE ?", ['%' . $this->search . '%'])
            ->orderBy('brand_id')
            ->orderBy('name')
            ->paginate(25);

        return view('livewire.models.list-model', compact('results'));
    }
}
