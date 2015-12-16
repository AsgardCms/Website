<?php

return [
    'galleryThumbnail' => [
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
            'height' => '370',
        ]
    ],
];
