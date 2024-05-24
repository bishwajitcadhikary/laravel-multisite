<?php

namespace WovoSoft\MultiSite\Database;

use WovoSoft\MultiSite\Contracts\Connectivity;
use WovoSoft\MultiSite\Contracts\Website;
use WovoSoft\MultiSite\Exceptions\DatabaseAlreadyExistsException;
use WovoSoft\MultiSite\Exceptions\DatabaseManagerNotRegisteredException;

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
