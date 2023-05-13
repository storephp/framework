<?php

namespace Store\Dashboard\Listeners;

use Store\Modules\Catalog\Events\AddFieldsToCategoryCreate;

class SendShipmentNotification
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\OrderShipped $event
     * @return void
     */
    public function handle(AddFieldsToCategoryCreate $event)
    {
        if ($event->generatePath == 'catalog.categories') {
            $event->form->addField('text', [
                'tab' => 'basic.id',
                'label' => 'Name category dd',
                'model' => 'named',
                'rules' => 'required',
                'order' => 10,
                'hint' => 'dsf dsf dsff',
            ]);
        }

        // dd($event->columns);
        // $event->row->addRow([
        //     'label' => 'slug',
        // ]);

        // $event->table->addColumn([
        //     'lable' => 'slug',
        //     'body' => [
        //         'type' => 'model',
        //         'value' => 'slug',
        //     ],
        // ]);

        // $event->table->addColumn([
        //     'lable' => 'sdsd',
        //     'body' => [
        //         'type' => 'model',
        //         'value' => 'parent->name',
        //     ],
        // ]);
    }
}

// $event->form->addField([
//     'label' => 'Slug category xx',
//     'type' => 'text',
//     'model' => 'slug_fdf',
//     'rules' => 'required',
//     'order' => 20,
// ]);
