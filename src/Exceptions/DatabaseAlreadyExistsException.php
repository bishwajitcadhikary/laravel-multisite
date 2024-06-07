<?php

namespace KinDigi\MultiSite\Exceptions;

use Exception;

class DatabaseAlreadyExistsException extends Exception
{
    /** @var string */
    protected string $database;

    public function reason(): string
    {
        return "Database {$this->database} already exists.";
    }

    public function __construct(string $database)
    {
        $this->database = $database;

        parent::__construct();
    }
}
