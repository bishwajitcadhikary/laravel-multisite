<?php

namespace KinDigi\MultiSite\Database;

use KinDigi\MultiSite\Contracts\Connectivity;
use KinDigi\MultiSite\Contracts\Website;
use KinDigi\MultiSite\Exceptions\DatabaseAlreadyExistsException;
use KinDigi\MultiSite\Exceptions\DatabaseManagerNotRegisteredException;

class DatabaseManager
{

    /**
     * @throws DatabaseManagerNotRegisteredException
     * @throws DatabaseAlreadyExistsException
     */
    public function ensureWebsiteCanBeCreated(Connectivity|Website $model): void
    {
        $manager = $model->config()->manager();

        if ($manager->databaseExists($database = $model->config()->getDatabaseName())){
            throw new DatabaseAlreadyExistsException($database);
        }
    }
}
