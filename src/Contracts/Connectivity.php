<?php

namespace KinDigi\MultiSite\Contracts;

use KinDigi\MultiSite\DatabaseConfig;

interface Connectivity
{
    public function config(): DatabaseConfig;
}
