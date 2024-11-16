<?php

return [
    'create_users' => false,
    'truncate_tables' => true,

    'roles_structure' => [
        'sadmin' => [
            'permission' => 'c,r,u,d',
            'role' => 'c,r,u,d',
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
