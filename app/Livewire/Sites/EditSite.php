<?php

namespace App\Livewire\Sites;

use App\Models\Site;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class EditSite extends Component {

    public $editModal = false;

    public $id;

    public $name;

    public function rules() {
        return [
            'name' => 'required|unique_site_name',
        ];
    }

    public function mount($id) {
        $this->id = $id;
    }

    public function edit($id) {
        $this->resetErrorBag();
        $this->resetValidation();

        $result = Site::where('id', $id)->first();
        $this->name = $result->name;

        $this->id = $id;
        $this->editModal = true;
    }

    public function update() {
        $result = Site::where('id', $this->id)->first();

        if ($result->name != $this->name) {
            $validator = Validator::make(
                [
                    'name' => $this->name,
                ],
                [
                    'name' => 'required|unique_site_name',
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

        $this->dispatch('site-updated');

        request()->session()->flash('success', 'Site Updated Successfully!');
    }

    public function cancel() {
        $this->editModal = false;
    }

    public function render() {
        return view('livewire.sites.edit-site');
    }
}
