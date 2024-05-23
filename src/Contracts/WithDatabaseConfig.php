<?php

namespace WovoSoft\MultiSite\Contracts;

use WovoSoft\MultiSite\DatabaseConfig;

interface WithDatabaseConfig
{
    public function databaseConfig($dbName = null): DatabaseConfig;

}
