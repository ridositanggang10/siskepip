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
        'admin' => [
            'users' => 'c,r,u,d',
            'berita' => 'r',
            'kritik_dan_saran' => 'r,d',
            'rating' => 'r,d',
            'standar_pelayanan' => 'r,d',
            'profile' => 'c,r,u,d',
            'instansi' => 'c,r,u,d'
        ],
        'user' => [
            'users' => 'r',
            'berita' => 'c,r,u,d',
            'kritik_dan_saran' => 'c,r,u',
            'rating' => 'c,r,u',
            'standar_pelayanan' => 'c,r,u,d',
            'profile' => 'r,u'
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
