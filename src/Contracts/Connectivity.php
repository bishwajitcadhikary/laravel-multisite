<?php

namespace WovoSoft\MultiSite\Contracts;

use WovoSoft\MultiSite\DatabaseConfig;

interface Connectivity
{
    public function config(): DatabaseConfig;
}
