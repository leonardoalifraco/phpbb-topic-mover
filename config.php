<?php

$config = array(
    'source' => array(
        'connection' => array(
            'dbname' => 'testforums',
            'user' => 'root',
            'password' => '',
            'host' => 'localhost',
            'driver' => 'pdo_mysql',
        ),
        'table_prefix' => 'foroum_'
    ),
    'target' => array(
        'connection' => array(
            'dbname' => 'testforums',
            'user' => 'root',
            'password' => '',
            'host' => 'localhost',
            'driver' => 'pdo_mysql',
        ),
        'table_prefix' => 'phpbb3_'
    )
);
