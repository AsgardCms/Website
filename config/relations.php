<?php

return [
    'User' => [
        'profile' => function ($self) {
            return $self->belongsTo('Modules\Profile\Entities\Profile', 'id', 'user_id')->first();
        },
        'entry' => function ($self) {
            return $self->belongsTo('Modules\Entry\Entities\Entry', 'email', 'email')->first();
        }
    ]
];
