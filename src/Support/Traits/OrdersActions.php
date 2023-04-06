<?php

namespace Basketin\Dashboard\Support\Traits;

trait OrdersActions
{
    public function addOrderAction($component, $statuses = [])
    {
        config([
            'basketin.dashboard.orders.actions' => array_merge([
                [
                    'component' => $component,
                    'statuses' => $statuses,
                ],
            ], config('basketin.dashboard.orders.actions', [])),
        ]);
    }
}
