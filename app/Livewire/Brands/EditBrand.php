<?php

namespace App\Livewire\Brands;

use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class EditBrand extends Component {

    public $editModal = false;

    public $id;

    public $name;

    public function rules() {
        return [
            'name' => 'required|unique_brand_name',
        ];
    }

    public function mount($id) {
        $this->id = $id;
    }

    public function edit($id) {
        $this->resetErrorBag();
        $this->resetValidation();

        $result = Brand::where('id', $id)->first();
        $this->name = $result->name;

        $this->id = $id;
        $this->editModal = true;
    }

    public function update() {
        $result = Brand::where('id', $this->id)->first();

        if ($result->name != $this->name) {
            $validator = Validator::make(
                [
                    'name' => $this->name,
                ],
                [
                    'name' => 'required|unique_brand_name',
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

        $this->dispatch('brand-updated');

        request()->session()->flash('success', 'Brand Updated Successfully!');
    }

    public function cancel() {
        $this->editModal = false;
    }

    public function render() {
        return view('livewire.brands.edit-brand');
    }
}
