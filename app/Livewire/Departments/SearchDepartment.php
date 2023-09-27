<?php

namespace App\Livewire\Departments;

use Livewire\Component;
use Livewire\Attributes\Url;

class SearchDepartment extends Component {

    #[Url()]
    public $search;

    public function updatedSearch() {
        $this->dispatch('department-search', $this->search);
    }

    public function render() {
        return view('livewire.departments.search-department');
    }
}
