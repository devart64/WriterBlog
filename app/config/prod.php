<?php

// Doctrine (db)
$app['db.options'] = [
    'driver'   => 'pdo_mysql',
    'charset'  => 'utf8',
    'host'     => 'localhost',
    'port'     => '3306',
    'dbname'   => 'WriterBlog',
    'user'     => 'root',
    'password' => '',
];

// define log level
$app['monolog.level'] = 'WARNING';