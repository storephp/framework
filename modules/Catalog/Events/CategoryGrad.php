<?php

namespace OutMart\Modules\Catalog\Events;

use Illuminate\Foundation\Events\Dispatchable;

class CategoryGrad
{
    use Dispatchable;

    /**
     * The order instance.
     *
     * @var $category
     */
    public $table;
    public $columns;

    /**
     * Create a new event instance.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function __construct($table, $columns)
    {
        $this->table = $table;
        $this->columns = $columns;
    }
}
