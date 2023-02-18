<?php

namespace OutMart\Dashboard\Listeners;

use OutMart\Modules\Catalog\Events\CategoryGrad;

class SendShipmentNotification
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\OrderShipped $event
     * @return void
     */
    public function handle(CategoryGrad $event)
    {
        // dd($event->columns);
        // $event->row->addRow([
        //     'label' => 'slug',
        // ]);

        $event->table->addColumn([
            'lable' => 'slug',
            'body' => [
                'type' => 'model',
                'value' => 'slug',
            ],
        ]);

        $event->table->addColumn([
            'lable' => 'sdsd',
            'body' => [
                'type' => 'model',
                'value' => 'parent->name',
            ],
        ]);
    }
}

// $event->form->addField([
//     'label' => 'Slug category xx',
//     'type' => 'text',
//     'model' => 'slug_fdf',
//     'rules' => 'required',
//     'order' => 20,
// ]);
