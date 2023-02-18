<?php

namespace OutMart\Modules\Catalog\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AddFieldsToCategoryCreate
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The order instance.
     *
     * @var \App\Models\Order
     */
    public $generatePath;

    /**
     * The order instance.
     *
     * @var \App\Models\Order
     */
    public $form;

    /**
     * Create a new event instance.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function __construct($generatePath, $form)
    {
        $this->generatePath = $generatePath;
        $this->form = $form;
    }
}
