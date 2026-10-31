<?php

namespace Modules\AllProduct\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Allproduct extends Component
{
    #[Layout('allproduct::components.layouts.master')]
    #[Title('همه محصولات')]
    public function render(): view
    {
        return view('allproduct::livewire.allproduct');
    }
}
