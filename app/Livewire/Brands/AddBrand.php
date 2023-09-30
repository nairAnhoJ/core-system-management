<?php

namespace App\Livewire\Brands;

use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AddBrand extends Component {

    public $addModal = false;

    public $name;

    public function rules() {
        return [
            'name' => 'required|unique_brand_name',
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
                'name' => 'required|unique_brand_name',
            ]
        );

        if ($validator->fails()) {
            $this->addModal = true;
            $this->validate();
            return;
        }

        $new = new Brand();
        $new->name = strtoupper($this->name);
        $new->key = Str::uuid()->toString();
        $new->save();

        $this->addModal = false;

        $this->reset(['name']);

        $this->dispatch('brand-created');

        request()->session()->flash('success', 'New Forklift Brand Created Successfully!');
    }

    public function cancel() {
        $this->addModal = false;
    }

    public function render() {
        return view('livewire.brands.add-brand');
    }
}
