<?php

// bootstrap.php
require __DIR__ . '/bootstrap.php';

return [
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/seeds'
    ],
    'migration_base_class' => 'Db\EloquentMigrationAdapter',
    'templates' => [
        'file' => '%%PHINX_CONFIG_DIR%%/stubs/migration.stub',
    ],
    'environments' => [
        'default_migration_table' => $_ENV['MIGRATIONS_TABLE'] ?? '__migrations',
        'default_environment' => $_ENV['DB_CONNECTION'],
        'mysql' => [
            'adapter' => 'mysql',
            'host' => $_ENV['DB_HOST'],
            'name' => $_ENV['DB_DATABASE'],
            'user' => $_ENV['DB_USERNAME'],
            'pass' => $_ENV['DB_PASSWORD'],
            'port' => $_ENV['DB_PORT'],
            'charset' => 'utf8mb4',
        ],
        'pgsql' => [
            'adapter' => 'pgsql',
            'host' => $_ENV['DB_HOST'],
            'name' => $_ENV['DB_DATABASE'],
            'user' => $_ENV['DB_USERNAME'],
            'pass' => $_ENV['DB_PASSWORD'],
            'port' => $_ENV['DB_PORT'],
            'charset' => 'utf8',
        ],
        'sqlite' => array(
            'adapter' => 'sqlite',
            'name' => $_ENV['DB_DATABASE'],
        ),
    ],
    'version_order' => 'creation'
];
