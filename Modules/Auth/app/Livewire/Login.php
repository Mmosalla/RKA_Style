<?php

namespace Modules\Auth\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate('required')]
    public $username;

    #[Validate('required|min:6')]
    public $password;

    #[Validate('required|regex:/^09\d{9}$/')]
    public $mobile;

    public function login()
    {
        $this->validate();

        if (Auth::attempt([
            'mobile' => $this->mobile,
            'username' => $this->username,
            'password' => $this->password,
        ])) {
            session()->regenerate();

            return redirect()->route('home');
        }

        $this->dispatch('Mismatch');
    }

    #[Layout('auth::components.layouts.master')]
    #[Title('ورود')]
    public function render(): View
    {
        return view('auth::livewire.login');
    }
}
