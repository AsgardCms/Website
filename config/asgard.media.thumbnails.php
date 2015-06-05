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
            'width' => 356,
            'height' => 170,
            'callback' => function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            },
        ],
    ]
];
