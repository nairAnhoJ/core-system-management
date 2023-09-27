<?php

namespace App\Livewire\Departments;

use App\Models\Department;
use Livewire\Component;

class DeleteDepartment extends Component {
    public $id;
    public $deleteModal = false;

    public $deleteName;

    public function mount($id) {
        $this->id = $id;
    }

    public function delete($id) {
        $result = Department::where('id', $id)->first();

        $this->deleteName = $result->name;

        $this->id = $id;
        $this->deleteModal = true;
    }

    public function destroy() {
        $result = Department::where('id', $this->id)->first();
        $result->is_deleted = 1;
        $result->save();

        $this->deleteModal = false;

        $this->dispatch('department-deleted');

        request()->session()->flash('success', 'Department Deleted Successfully!');
    }

    public function cancel() {
        $this->deleteModal = false;
    }

    public function render() {
        return view('livewire.departments.delete-department');
    }
}
