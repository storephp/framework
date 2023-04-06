<?php

namespace Basketin\Modules\Catalog\Events;

use Illuminate\Foundation\Events\Dispatchable;

class ProductCreated
{
    use Dispatchable;

    /**
     * The order instance.
     *
     * @var $category
     */
    public $product;

    /**
     * The order instance.
     *
     * @var $form
     */
    public $data;

    /**
     * Create a new event instance.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function __construct($product, $data)
    {
        $this->product = $product;
        $this->data = $data;
    }
}
