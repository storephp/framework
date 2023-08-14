<?php

namespace StorePHP\Dashboard\Http\Livewire\System;

use Livewire\Component;

class Updates extends Component
{
    public $hasNewUpdate = false;
    public $titleUpdate = 'There is no update';

    public function render()
    {
        return <<<'blade'
            <a href="#" class="nav-link px-0" data-bs-toggle="tooltip" data-bs-placement="bottom"
            aria-label="{{ $titleUpdate }}" data-bs-original-title="{{ $titleUpdate }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh"
                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                    <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
                </svg>

                @if($hasNewUpdate)
                    <span class="badge bg-red badge-blink"></span>
                @endif
            </a>
        blade;
    }
}
