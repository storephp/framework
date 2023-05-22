<?php

return [
    'version' => '1.0.0',

    'routes' => [
        'prefix' => 'storephp',
        'middlewares' => [],
    ],

    'core' => [
        'fields' => [
            'catalog' => [
                'categories' => [
                    //
                ],
            ],
        ],
        'modules' => [],

        'languages' => [
            'arabic' => [
                'lang_code' => 'ar',
                'direction' => 'rtl',
            ],
            'english' => [
                'lang_code' => 'en',
                'direction' => 'ltr',
            ],
        ],
    ],
];
