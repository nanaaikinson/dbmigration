<?php

namespace Db;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Builder;
use Phinx\Migration\AbstractMigration;

class EloquentMigrationAdapter extends AbstractMigration
{
    public Capsule $capsule;

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
                $config['charset'] = 'utf8mb4';
                $config['collation'] = 'utf8mb4_unicode_ci';
                break;

            case 'pgsql':
                $config['driver'] = 'pgsql';
                $config['host'] = $_ENV['DB_HOST'];
                $config['port'] = $_ENV['DB_PORT'];
                $config['database'] = $_ENV['DB_DATABASE'];
                $config['username'] = $_ENV['DB_USERNAME'];
                $config['password'] = $_ENV['DB_PASSWORD'];
                $config['charset'] = 'utf8';
                $config['prefix'] = '';
                $config['prefix_indexes'] = true;
                $config['schema'] = 'public';
                $config['search_path'] = 'public';
                $config['sslmode'] = $_ENV['DB_SSLMODE'];
                break;
        }

        $this->capsule = new Capsule;
        $this->capsule->addConnection($config);
        $this->capsule->setAsGlobal();
        $this->capsule->bootEloquent();
        $this->schema = $this->capsule->schema();
    }
}
