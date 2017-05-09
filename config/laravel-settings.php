<?php

return [

    'models' => [

        'settings' => [

            'modelClass'    => Finagin\Settings\Models\Settings::class,
            'contractClass' => Finagin\Settings\Contracts\Settings::class,

        ],

    ],

    'table' => [

        'prefix' => '',

        'names' => [

            'settings' => 'settings',

        ],

    ],

];
