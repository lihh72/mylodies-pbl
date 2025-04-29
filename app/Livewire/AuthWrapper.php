<?php

namespace App\Livewire;

use Livewire\Component;

class AuthWrapper extends Component
{
    public $scrolled = false;

    public function mount()
    {
        // Timer auto scroll
        $this->dispatch('autoScroll')->later(3000);
    }

    public function triggerScroll()
    {
        $this->scrolled = true;
    }

    public function render()
    {
        return view('livewire.auth-wrapper');
    }
}
