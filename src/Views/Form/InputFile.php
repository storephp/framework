<?php

namespace OutMart\Dashboard\Views\Form;

use Illuminate\View\Component;

class InputFile extends Component
{
    public function __construct(
        public $label = 'set label',
        public $placeholder = '',
        public $model = 'set name',
        public $hint = null,
        public $required = false,
    ) {
    }

    public function render()
    {
        return view('outmart::components.form.inputFile');
    }
}
