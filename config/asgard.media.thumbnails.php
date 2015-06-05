<?php

return [
    'smallThumb' => [
        'resize' => [
            'width' => 50,
            'height' => null,
            'callback' => function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            },
        ],
    ],
    'featureThumb' => [
        'resize' => [
            'width' => 500,
            'height' => null,
            'callback' => function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            },
        ],
        'crop' => [
            'width' => '500',
            'height' => '200',
            'x' => 0,
            'y' => 0,
        ],
    ]
];
