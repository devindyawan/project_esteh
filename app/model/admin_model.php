<?php

$_admin_tables = [
    'users' => [
        'id'            => 'INT NOT NULL AUTO_INCREMENT PRIMARY KEY',
        'username'      => 'VARCHAR(255) NOT NULL',
        'email'         => 'VARCHAR(255) NOT NULL',
        'password'      => 'VARCHAR(255) NOT NULL',
        'role_id'       => 'INT NOT NULL',
        'access_token'  => 'VARCHAR(255) NOT NULL',
    ],
    'roles' => [
        'id'            => 'INT NOT NULL AUTO_INCREMENT PRIMARY KEY',
        'role_name'     => 'VARCHAR(255) NOT NULL',
        'permission'    => 'VARCHAR(255) NOT NULL',
    ],
];

$_admin_foreign_key = [
    'role' => [
        'users' => 'role_id',
        'roles' => 'id',
    ]
];
