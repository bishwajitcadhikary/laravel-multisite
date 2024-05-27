<?php

declare(strict_types=1);

namespace WovoSoft\MultiSite\Database\Managers;

use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use WovoSoft\MultiSite\Contracts\Connectivity;
use WovoSoft\MultiSite\Contracts\DatabaseManager;
use WovoSoft\MultiSite\Contracts\Website;
use WovoSoft\MultiSite\Exceptions\NoConnectionSetException;

class MySQLDatabaseManager implements DatabaseManager
{
    /** @var string|null */
    protected string|null $connection;

    /**
     * Get database connection
     * @throws NoConnectionSetException
     */
    protected function connection(): Connection
    {
        if ($this->connection === null) {
            throw new NoConnectionSetException(static::class);
        }

        return DB::reconnect($this->connection);
    }

    public function setConnection(string $connection): void
    {
        $this->connection = $connection;
    }

    public function setConfiguration(array $config): void
    {
        foreach ($config as $key => $value){
            config(["database.connections.$this->connection.$key" => $value ?? config("database.connections.$this->connection.$key")]);
        }
    }

    /**
     * @throws NoConnectionSetException
     */
    public function createDatabase(Website $website): static
    {
        $database = $website->config()->getDatabaseName();
        $charset = $this->connection()->getConfig('charset');
        $collation = $this->connection()->getConfig('collation');

        $this->connection()->statement("CREATE DATABASE `{$database}` CHARACTER SET `$charset` COLLATE `$collation`");

        return $this;
    }

    /**
     * @throws NoConnectionSetException
     */
    public function importDatabase(Website $website): bool
    {
        $path = $website->application->database_path;

        if (!Storage::exists($path)){
            throw new \Exception("Database file not found");
        }

        $file = Storage::get($path);

        config(["database.connections.$this->connection.database" => $website->config()->getDatabaseName()]);

        return $this->connection()->unprepared($file);
    }

    /**
     * @throws NoConnectionSetException
     */
    public function deleteDatabase(Website $website): bool
    {
        return $this->connection()->statement("DROP DATABASE `{$website->config()->getDatabaseName()}`");
    }

    /**
     * @throws NoConnectionSetException
     */
    public function databaseExists(string $name): bool
    {
        return (bool) $this->connection()->select("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$name'");
    }

    public function makeConnectionConfig(array $baseConfig, string $databaseName): array
    {
        $baseConfig['database'] = $databaseName;

        return $baseConfig;
    }
}
