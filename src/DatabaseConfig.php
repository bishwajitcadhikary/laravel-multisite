<?php

namespace KinDigi\MultiSite;

use KinDigi\MultiSite\Contracts\Connectivity;
use KinDigi\MultiSite\Contracts\DatabaseManager;
use KinDigi\MultiSite\Contracts\Website;
use KinDigi\MultiSite\Exceptions\DatabaseManagerNotRegisteredException;

class DatabaseConfig
{
    /**
     * @var Connectivity
     */
    protected Connectivity $connectivity;
    /**
     *
     * @var Website|null
     */
    protected Website|null $website;

    public function __construct(Connectivity $connectivity, Website|null $website = null)
    {
        $this->connectivity = $connectivity;
        $this->website = $website;
    }

    public function getDatabaseName(): ?string
    {
        if ($this->website !== null){
            return $this->website->db_name ?? config('multisite.database.prefix') . $this->website->getKey() . config('multisite.database.suffix');
        }

        return $this->connectivity->database;
    }

    public function getUsername(): ?string
    {
        return $this->website->db_username ?? $this->connectivity->username;
    }

    public function getPassword(): ?string
    {
        return $this->website->db_password ?? $this->connectivity->password;
    }

    public function makeCredentials(): static
    {
        $this->website->db_name = $this->getDatabaseName();

        // Save username & password if needed

        if ($this->website->exists) {
            $this->website->save();
        }

        return $this;
    }

    public function getConnectionName(): string
    {
        return 'multisite_' . $this->connectivity->driver;
    }

    public function getConnectionConfig(): array
    {
        return [
            'driver' => $this->connectivity->driver,
            'host' => $this->connectivity->host,
            'port' => $this->connectivity->port,
            'database' => $this->connectivity->database,
            'username' => $this->connectivity->username,
            'password' => $this->connectivity->password,
            'unix_socket' => $this->connectivity->unix_socket,
            'charset' => $this->connectivity->charset,
            'collation' => $this->connectivity->collation,
            'strict' => $this->connectivity->strict,
        ];
    }

    /**
     * Get the database manager.
     *
     * @throws DatabaseManagerNotRegisteredException
     */
    public function manager(): DatabaseManager
    {
        $driver = config('database.connections.' . $this->getConnectionName() . '.driver');
        $databaseManagers = config('multisite.database.managers');

        if (!array_key_exists($driver, $databaseManagers)) {
            throw new DatabaseManagerNotRegisteredException($driver);
        }

        $databaseManager = app($databaseManagers[$driver]);

        $databaseManager->setConnection($this->getConnectionName());
        $databaseManager->setConfiguration($this->getConnectionConfig());

        return $databaseManager;
    }
}
