<?php

namespace KinDigi\MultiSite\Contracts;

use KinDigi\MultiSite\Exceptions\NoConnectionSetException;

interface DatabaseManager
{
    /**
     * Create a database.
     */
    public function createDatabase(Website $website): static;

    /**
     * Delete a database.
     */
    public function deleteDatabase(Website $website): bool;

    /**
     * Does a database exists.
     *
     * @param string $name
     * @return bool
     */
    public function databaseExists(string $name): bool;

    /**
     * Make a DB connection config array.
     *
     * @param array $baseConfig
     * @param string $databaseName
     * @return array
     */
    public function makeConnectionConfig(array $baseConfig, string $databaseName): array;

    /**
     * Set the DB connection that should be used by the tenant database manager.
     *
     * @throws NoConnectionSetException
     *
     * @param string $connection
     * @return void
     */
    public function setConnection(string $connection): void;

    public function setConfiguration(array $config): void;
}
