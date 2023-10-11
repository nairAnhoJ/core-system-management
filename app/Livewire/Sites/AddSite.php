<?php

namespace App\Livewire\Sites;

use App\Models\Site;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AddSite extends Component {

    public $addModal = false;

    public $name;
    public $area;

    public function rules() {
        return [
            'name' => 'required|unique_site_name',
            'area' => 'required',
        ];
    }

    public function add() {
        $this->reset(['name', 'area']);
        $this->resetErrorBag();
        $this->resetValidation();
        $this->addModal = true;
    }

    public function store() {
        $validator = Validator::make(
            [
                'name' => $this->name,
                'area' => $this->area,
            ],
            [
                'name' => 'required|unique_site_name',
            ]
        );

        if ($validator->fails()) {
            $this->addModal = true;
            $this->validate();
            return;
        }

        $new = new Site();
        $new->name = strtoupper($this->name);
        $new->area = strtoupper($this->area);
        $new->key = Str::uuid()->toString();
        $new->save();

        $this->addModal = false;

        $this->reset(['name']);

        $this->dispatch('site-created');

        request()->session()->flash('success', 'New Site Created Successfully!');
    }

    public function cancel() {
        $this->addModal = false;
    }

    public function render() {
        return view('livewire.sites.add-site');
    }
}
