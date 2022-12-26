<?php

namespace OutMart\Dashboard\Http\Livewire;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('outmart::home')->layout('outmart::layouts.dashboard');
    }
}
