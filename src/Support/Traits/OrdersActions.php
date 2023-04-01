<?php

namespace OutMart\Dashboard\Support\Traits;

trait OrdersActions
{
    public function addOrderAction($component, $statuses = [])
    {
        config([
            'outmart.dashboard.orders.actions' => array_merge([
                [
                    'component' => $component,
                    'statuses' => $statuses,
                ],
            ], config('outmart.dashboard.orders.actions', [])),
        ]);
    }
}
