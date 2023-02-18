<?php

namespace OutMart\Dashboard\Views\Form;

use Illuminate\View\Component;

class InputText extends Component
{
    public function __construct(
        public $label = 'set label',
        public $placeholder = 'set placeholder',
        public $model = 'set name',
        public $hint = null,
    ) {
    }

    public function render()
    {
        return view('outmart::components.form.inputText');
    }
}
