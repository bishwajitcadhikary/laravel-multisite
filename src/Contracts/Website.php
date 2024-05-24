<?php

namespace WovoSoft\MultiSite\Contracts;

use WovoSoft\MultiSite\DatabaseConfig;

interface Website
{
    public function config(): DatabaseConfig;
}
