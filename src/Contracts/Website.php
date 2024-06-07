<?php

namespace KinDigi\MultiSite\Contracts;

use KinDigi\MultiSite\DatabaseConfig;

interface Website
{
    public function config(): DatabaseConfig;
}
