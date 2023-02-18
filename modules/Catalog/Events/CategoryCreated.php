<?php

namespace OutMart\Modules\Catalog\Events;

use Illuminate\Foundation\Events\Dispatchable;

class CategoryCreated
{
    use Dispatchable;

    /**
     * The order instance.
     *
     * @var $category
     */
    public $category;

    /**
     * The order instance.
     *
     * @var $form
     */
    public $form;

    /**
     * Create a new event instance.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function __construct($category, $form)
    {
        $this->category = $category;
        $this->form = $form;
    }
}
