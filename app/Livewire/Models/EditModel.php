<?php

namespace App\Livewire\Models;

use App\Models\Brand;
use App\Models\FLModel;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class EditModel extends Component {

    public $editModal = false;

    public $id;

    public $name;
    public $brand;

    public function rules() {
        return [
            'brand' => 'required',
            'name' => 'required|unique_model_name:' . $this->name . ',' . $this->brand,
        ];
    }

    public function mount($id) {
        $this->id = $id;
    }

    public function edit($id) {
        $this->resetErrorBag();
        $this->resetValidation();

        $result = FLModel::where('id', $id)->first();
        $this->name = $result->name;
        $this->brand = $result->brand_id;

        $this->id = $id;
        $this->editModal = true;
    }

    public function update() {
        $result = FLModel::where('id', $this->id)->first();

        $validator = Validator::make(
            [
                'brand' => $this->brand,
                'name' => $this->name,
            ],
            [
                'brand' => 'required',
                'name' => 'required|unique_model_name:' . $this->name . ',' . $this->brand,
            ]
        );

        if ($validator->fails()) {
            $this->editModal = true;
            $this->validate();
            return;
        }

        $result->brand_id = $this->brand;
        $result->name = strtoupper($this->name);
        $result->save();

        $this->editModal = false;

        $this->reset(['name']);

        $this->dispatch('model-updated');

        request()->session()->flash('success', 'Model Updated Successfully!');
    }

    public function cancel() {
        $this->editModal = false;
    }

    public function render() {
        $brands = Brand::where('is_deleted', 0)->get();

        return view('livewire.models.edit-model', compact('brands'));
    }
}
