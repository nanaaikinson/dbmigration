<?php

namespace Db;

// require __DIR__ . '/../bootstrap.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Phinx\Migration\AbstractMigration;

class EloquentMigrationAdapter extends AbstractMigration
{
    /** @var \Illuminate\Database\Capsule\Manager $capsule */
    public $capsule;

    /** @var \Illuminate\Database\Schema\Builder $capsule */
    public $schema;

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
                $config['charset'] = $_ENV['DB_CHARSET'] ?? 'utf8mb4';
                $config['collation'] = $ENV_['DB_COLLATION'] ?? 'utf8mb4_unicode_ci';
                break;

            case 'pgsql':
                $config['driver'] = 'pgsql';
                $config['host'] = $_ENV['DB_HOST'];
                $config['port'] = $_ENV['DB_PORT'];
                $config['database'] = $_ENV['DB_DATABASE'];
                $config['username'] = $_ENV['DB_USERNAME'];
                $config['password'] = $_ENV['DB_PASSWORD'];
                $config['charset'] = $_ENV['DB_CHARSET'] ?? 'utf8';
                break;
        }

        $this->capsule = new Capsule;
        $this->capsule->addConnection($config);
        $this->capsule->setAsGlobal();
        $this->capsule->bootEloquent();
        $this->schema = $this->capsule->schema();
    }
}
