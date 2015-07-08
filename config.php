<?php

$config = [
    'source' => [
        'connection' => [
            'dbname' => 'testforums',
            'user' => 'root',
            'password' => '',
            'host' => 'localhost',
            'driver' => 'pdo_mysql',
        ],
        'table_prefix' => 'foroum_'
    ],
    'target' => [
        'connection' => [
            'dbname' => 'testforums',
            'user' => 'root',
            'password' => '',
            'host' => 'localhost',
            'driver' => 'pdo_mysql',
        ],
        'table_prefix' => 'phpbb3_'
    ]
];
