<?php

namespace WovoSoft\MultiSite\Database\Concerns;

use WovoSoft\MultiSite\DatabaseConfig;

trait HasDatabaseConfig
{
    public function databaseConfig($dbName = null): DatabaseConfig
    {
        return new DatabaseConfig($this, $dbName);
    }
}
