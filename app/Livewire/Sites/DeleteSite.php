<?php

namespace App\Livewire\Sites;

use App\Models\Site;
use Livewire\Component;

class DeleteSite extends Component {
    public $id;
    public $deleteModal = false;

    public $deleteName;

    public function mount($id) {
        $this->id = $id;
    }

    public function delete($id) {
        $result = Site::where('id', $id)->first();

        $this->deleteName = $result->name;

        $this->id = $id;
        $this->deleteModal = true;
    }

    public function destroy() {
        $result = Site::where('id', $this->id)->first();
        $result->is_deleted = 1;
        $result->save();

        $this->deleteModal = false;

        $this->dispatch('site-deleted');

        request()->session()->flash('success', 'Site Deleted Successfully!');
    }

    public function cancel() {
        $this->deleteModal = false;
    }

    public function render() {
        return view('livewire.sites.delete-site');
    }
}
