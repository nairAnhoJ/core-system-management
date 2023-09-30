<?php

namespace App\Livewire\Models;

use App\Models\FLModel;
use Livewire\Component;

class DeleteModel extends Component {
    public $id;
    public $deleteModal = false;

    public $deleteBrand;
    public $deleteName;

    public function mount($id) {
        $this->id = $id;
    }

    public function delete($id) {
        $result = FLModel::with('brand')->where('id', $id)->first();

        $this->deleteBrand = $result->brand->name;
        $this->deleteName = $result->name;

        $this->id = $id;
        $this->deleteModal = true;
    }

    public function destroy() {
        $result = FLModel::where('id', $this->id)->first();
        $result->is_deleted = 1;
        $result->save();

        $this->deleteModal = false;

        $this->dispatch('model-deleted');

        request()->session()->flash('success', 'Model Deleted Successfully!');
    }

    public function cancel() {
        $this->deleteModal = false;
    }

    public function render() {
        return view('livewire.models.delete-model');
    }
}
