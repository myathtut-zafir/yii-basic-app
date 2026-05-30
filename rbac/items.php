<?php

return [
    'monstermash/update' => [
        'type' => 2,
        'description' => 'Update monstermash',
    ],
    'monstermash/delete' => [
        'type' => 2,
        'description' => 'Delete monstermash',
    ],
    'member' => [
        'type' => 1,
        'children' => [
            'monstermash/update',
        ],
    ],
    'admin' => [
        'type' => 1,
        'children' => [
            'monstermash/delete',
            'monstermash/update',
        ],
    ],
];
