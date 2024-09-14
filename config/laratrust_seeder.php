<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'super-admin' => [
            'dashboard' => 'r',
            'personalinfo' => 'r',
            'categories' => 'c,r,u,d',
            'cities' => 'c,r,u,d',
            'users' => 'c,r,u,d',
            'advertisements' => 'c,r,u,d',
            'cancel-reasons' => 'c,r,u,d',
            'genders' => 'c,r,u,d',
            'setting' => 'r',
            'info' => 'r',
            'structure' => 'r',
            'managers' => 'c,r,u,d',
            'roles' => 'c,r,u,d',
            'bookings' => 'c,r,u,d',
            'structure' => 'r,u',
        ],
        'admin' => [
            'dashboard' => 'r',
            'personalinfo' => 'r',
        ],

    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];
