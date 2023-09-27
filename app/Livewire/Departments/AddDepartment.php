<?php

namespace App\Livewire\Departments;

use App\Models\Department;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Illuminate\Support\Str;

class AddDepartment extends Component {

    public $addModal = false;

    public $name;

    public function rules() {
        return [
            'name' => 'required|unique_department_name',
        ];
    }

    public function add() {
        $this->reset(['name']);
        $this->resetErrorBag();
        $this->resetValidation();
        $this->addModal = true;
    }

    public function store() {
        $validator = Validator::make(
            [
                'name' => $this->name,
            ],
            [
                'name' => 'required|unique_department_name',
            ]
        );

        if ($validator->fails()) {
            $this->addModal = true;
            $this->validate();
            return;
        }

        $new_department = new Department();
        $new_department->name = strtoupper($this->name);
        $new_department->key = Str::uuid()->toString();
        $new_department->save();

        $this->addModal = false;

        $this->reset(['name']);

        $this->dispatch('department-created');

        request()->session()->flash('success', 'New Department Created Successfully!');
    }

    public function cancel() {
        $this->addModal = false;
    }

    public function render() {
        return view('livewire.departments.add-department');
    }
}
