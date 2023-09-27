<?php

namespace App\Livewire\Departments;

use App\Models\Department;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class EditDepartment extends Component {

    public $editModal = false;

    public $id;

    public $name;

    public function rules() {
        return [
            'name' => 'required|unique_department_name',
        ];
    }

    public function mount($id) {
        $this->id = $id;
    }

    public function edit($id) {
        $this->resetErrorBag();
        $this->resetValidation();

        $result = Department::where('id', $id)->first();
        $this->name = $result->name;

        $this->id = $id;
        $this->editModal = true;
    }

    public function update() {
        $result = Department::where('id', $this->id)->first();

        if ($result->name != $this->name) {
            $validator = Validator::make(
                [
                    'name' => $this->name,
                ],
                [
                    'name' => 'required|unique_department_name',
                ]
            );

            if ($validator->fails()) {
                $this->editModal = true;
                $this->validate();
                return;
            }
        }

        $result->name = strtoupper($this->name);
        $result->save();

        $this->editModal = false;

        $this->reset(['name']);

        $this->dispatch('department-updated');

        request()->session()->flash('success', 'Department Updated Successfully!');
    }

    public function cancel() {
        $this->editModal = false;
    }

    public function render() {
        return view('livewire.departments.edit-department');
    }
}
