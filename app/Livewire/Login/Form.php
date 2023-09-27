<?php

namespace App\Livewire\Login;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Form extends Component {
    public $username;
    public $password;

    public function rules() {
        return [
            'username' => 'required',
            'password' => 'required',
        ];
    }

    public function authenticate() {
        // dd($this->username);
        $this->validate();

        if (Auth::attempt(['username' => $this->username, 'password' => $this->password])) {
            return redirect()->route('departments');
        }
    }

    public function render() {
        return view('livewire.login.form');
    }
}
