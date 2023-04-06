<?php
namespace Basketin\Dashboard\Views\Components\Widgets;

use Illuminate\View\Component;

class WidgetEmptyData extends Component
{
    public function __construct(
        public $icon = 'mood-sad',
        public $title = 'No results found',
        public $subtitle = '',
        public $actionIcon = 'square-rounded-plus-filled',
        public $actionLabel = 'Create new',
        public $actionRoute = null,
    ) {
    }

    public function render()
    {
        return view('basketin::components.widgets.emptyData');
    }
}
