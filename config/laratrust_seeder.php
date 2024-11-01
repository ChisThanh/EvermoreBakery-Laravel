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
            'user' => 'c,r,u,d',
            'category' => 'c,r,u,d',
            'product' => 'c,r,u,d',
            'product-review' => 'c,r,u,d',
            'bill' => 'c,r,u,d',
            'coupon' => 'c,r,u,d',
            'chat' => 'c,r,u,d',
            'product-interaction' => 'c,r,u,d',
            'statistical' => 'a'
        ],
        'employee' => [
            'user' => 'c,r,u',
            'category' => 'c,r,u',
            'product' => 'c,r,u',
            'product-review' => 'c,r,u',
            'bill' => 'c,r,u',
            'coupon' => 'c,r,u',
            'chat' => 'c,r,u',
            'product-interaction' => 'c,r,u',
            'statistical' => 'a'
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
