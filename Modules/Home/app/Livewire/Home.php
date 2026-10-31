<?php

namespace Modules\Home\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Home extends Component
{
    #[Layout('home::components.layouts.master')]
    #[Title('آرکا . استایل')]
    public function render():view
    {
        return view('home::livewire.home');
    }
}
