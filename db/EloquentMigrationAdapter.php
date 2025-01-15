<?php

namespace Db;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Builder;
use Phinx\Migration\AbstractMigration;

class EloquentMigrationAdapter extends AbstractMigration
{
    // /** @var \Illuminate\Database\Capsule\Manager $capsule */
    public Capsule $capsule;

    // /** @var \Illuminate\Database\Schema\Builder $capsule */
    public Builder $schema;

    public function init()
    {
        $config = [];

        switch ($_ENV['DB_CONNECTION']) {
            case 'sqlite':
                $config['driver'] = 'sqlite';
                $config['database'] = $_ENV['DB_DATABASE'];
                break;

            case 'mysql':
                $config['driver'] = 'mysql';
                $config['host'] = $_ENV['DB_HOST'];
                $config['port'] = $_ENV['DB_PORT'];
                $config['database'] = $_ENV['DB_DATABASE'];
                $config['username'] = $_ENV['DB_USERNAME'];
                $config['password'] = $_ENV['DB_PASSWORD'];
                $config['charset'] = $_ENV['DB_CHARSET'] && $_ENV['DB_CHARSET'] != '' ? $_ENV['DB_CHARSET'] : 'utf8mb4';
                $config['collation'] = $_ENV['DB_COLLATION'] && $_ENV['DB_COLLATION'] != '' ? $_ENV['DB_COLLATION'] : 'utf8mb4_unicode_ci';
                break;

            case 'pgsql':
                $config['driver'] = 'pgsql';
                $config['host'] = $_ENV['DB_HOST'];
                $config['port'] = $_ENV['DB_PORT'];
                $config['database'] = $_ENV['DB_DATABASE'];
                $config['username'] = $_ENV['DB_USERNAME'];
                $config['password'] = $_ENV['DB_PASSWORD'];
                $config['charset'] = $_ENV['DB_CHARSET'] && $_ENV['DB_CHARSET'] != '' ? $_ENV['DB_CHARSET'] : 'utf8';
                break;
        }

        $this->capsule = new Capsule;
        $this->capsule->addConnection($config);
        $this->capsule->setAsGlobal();
        $this->capsule->bootEloquent();
        $this->schema = $this->capsule->schema();
    }
}
