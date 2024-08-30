<?php

return [
    'create_users' => false,
    'truncate_tables' => true,

    'roles_structure' => [
        'sadmin' => [
            'all' => 'c,r,u,d',
            'statistical' => 'a'
        ],
        'admin' => [
            'all' => 'c,r,u,d',
            'printer' => 'a'
        ],
        'user' => [
            'all' => 'r,u',
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
        'a' => 'approve',
    ],
];
