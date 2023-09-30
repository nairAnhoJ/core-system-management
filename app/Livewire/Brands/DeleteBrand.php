<?php

namespace App\Livewire\Brands;

use App\Models\Brand;
use Livewire\Component;

class DeleteBrand extends Component {
    public $id;
    public $deleteModal = false;

    public $deleteName;

    public function mount($id) {
        $this->id = $id;
    }

    public function delete($id) {
        $result = Brand::where('id', $id)->first();

        $this->deleteName = $result->name;

        $this->id = $id;
        $this->deleteModal = true;
    }

    public function destroy() {
        $result = Brand::where('id', $this->id)->first();
        $result->is_deleted = 1;
        $result->save();

        $this->deleteModal = false;

        $this->dispatch('brand-deleted');

        request()->session()->flash('success', 'Brand Deleted Successfully!');
    }

    public function cancel() {
        $this->deleteModal = false;
    }

    public function render() {
        return view('livewire.brands.delete-brand');
    }
}
