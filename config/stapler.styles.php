<?php

return [
    \App\Models\Locations\Country::class => [
        'arms'        => [
            'styles'        => [

            ],
            'relative_path' => '/countries/:id_partition/arms/:style/:filename',
        ],
        'arms_shadow' => [
            'styles'        => [

            ],
            'relative_path' => '/countries/:id_partition/arms_shadow/:style/:filename',
        ],
    ],

    \App\Models\Locations\Location::class => [
        'image' => [
            'styles' => [

            ],
            'path'   => '/locations/:id_partition/arms/:style/:filename'
        ]
    ]

];