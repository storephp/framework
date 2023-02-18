<?php

namespace OutMart\Dashboard\Views\Form;

use Illuminate\View\Component;

class Select extends Component
{
    public function __construct(
        public $label = 'set label',
        public $placeholder = 'set placeholder',
        public $model = 'set name',
        public $options = [],
        public $hint = null,
    ) {
    }

    public function render()
    {
        return view('outmart::components.form.select');
    }
}
