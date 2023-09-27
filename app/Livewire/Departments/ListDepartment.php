<?php

namespace App\Livewire\Departments;

use App\Models\Department;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class ListDepartment extends Component {

    use WithPagination;

    public $search;

    #[On('department-search')]
    public function updateSearch($search) {
        $this->search = $search;
        $this->resetPage();
    }

    #[On('department-created')]
    #[On('department-updated')]
    #[On('department-deleted')]

    public function render() {
        $results = Department::where('is_deleted', 0)
            ->whereRaw("CONCAT_WS(' ', name) LIKE ?", ['%' . $this->search . '%'])
            ->orderBy('name')
            ->paginate(25);

        return view('livewire.departments.list-department', compact('results'));
    }
}
