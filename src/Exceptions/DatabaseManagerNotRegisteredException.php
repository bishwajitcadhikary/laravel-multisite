<?php

namespace WovoSoft\MultiSite\Exceptions;

use Exception;

class DatabaseManagerNotRegisteredException extends Exception
{
    public function __construct($driver)
    {
        parent::__construct("Database manager for driver $driver is not registered.");
    }
}
