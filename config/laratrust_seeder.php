<?php

return [
    'create_users' => false,
    'truncate_tables' => true,

    'roles_structure' => [
        'sadmin' => [
            'permission' => 'a',
            'role' => 'a',
            'user' => 'c,r,u,d',
        ],
        'admin' => [
            'all' => 'c,r,u,d',
        ],
        'user' => [
            "all" => "c,r,u",
        ],
        'customer' => [
            'all' => 'r',
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
