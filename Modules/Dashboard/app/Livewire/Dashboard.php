<?php

namespace Modules\Dashboard\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Layout('dashboard::components.layouts.master')]
    #[Title('داشبورد مدیریت')]
    public function render(): view
    {
        return view('dashboard::livewire.dashboard');
    }
}
