<?php

namespace App\Livewire\Sites;

use App\Models\Site;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class ListSite extends Component {

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
        $results = Site::where('is_deleted', 0)
            ->whereRaw("CONCAT_WS(' ', name) LIKE ?", ['%' . $this->search . '%'])
            ->orderBy('name')
            ->paginate(25);

        return view('livewire.sites.list-site', compact('results'));
    }
}
