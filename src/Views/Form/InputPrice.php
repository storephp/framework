<?php

namespace Store\Dashboard\Views\Form;

use Illuminate\View\Component;

class InputPrice extends Component
{
    public function __construct(
        public $label = 'set label',
        public $placeholder = '',
        public $model = 'set name',
        public $hint = null,
        public $required = false,
        public $currency = 'USD',
    ) {
    }

    public function render()
    {
        return view('store::components.form.inputPrice');
    }
}
