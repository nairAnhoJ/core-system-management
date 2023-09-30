<?php

namespace App\Livewire\Models;

use App\Models\Brand;
use App\Models\FLModel;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AddModel extends Component {

    public $addModal = false;

    public $name;
    public $brand;

    public function rules() {
        return [
            'brand' => 'required',
            'name' => 'required|unique_model_name:' . $this->name . ',' . $this->brand,
        ];
    }

    public function add() {
        $this->reset(['name', 'brand']);
        $this->resetErrorBag();
        $this->resetValidation();
        $this->addModal = true;
    }

    public function store() {
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
            $this->addModal = true;
            $this->validate();
            return;
        }

        $new = new FLModel();
        $new->brand_id = $this->brand;
        $new->name = strtoupper($this->name);
        $new->key = Str::uuid()->toString();
        $new->save();

        $this->addModal = false;

        $this->reset(['name', 'brand']);

        $this->dispatch('model-created');

        request()->session()->flash('success', 'New Forklift Model Created Successfully!');
    }

    public function cancel() {
        $this->addModal = false;
    }

    public function render() {
        $brands = Brand::where('is_deleted', 0)->get();

        return view('livewire.models.add-model', compact('brands'));
    }
}
