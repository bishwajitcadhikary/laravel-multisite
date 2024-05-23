<?php

namespace WovoSoft\MultiSite;

use WovoSoft\MultiSite\Contracts\Connectivity;

class DatabaseConfig
{
    /**
     * @var Connectivity
     */
    protected Connectivity $connectivity;

    /**
     * @var string|null
     */
    protected string|null $dbName;

    public function __construct(Connectivity $connectivity, $dbName = null)
    {
        $this->connectivity = $connectivity;
        $this->dbName = $dbName;
    }
}
