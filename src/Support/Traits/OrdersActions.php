<?php

namespace Store\Dashboard\Support\Traits;

trait OrdersActions
{
    public function addOrderAction($component, $statuses = [])
    {
        config([
            'store.dashboard.orders.actions' => array_merge([
                [
                    'component' => $component,
                    'statuses' => $statuses,
                ],
            ], config('store.dashboard.orders.actions', [])),
        ]);
    }
}
