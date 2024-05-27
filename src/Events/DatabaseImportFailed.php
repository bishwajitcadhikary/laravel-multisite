<?php

namespace WovoSoft\MultiSite\Events;

class DatabaseImportFailed extends Contracts\WebsiteEvent
{

    public $e;

    public function __construct($website, $e)
    {
        parent::__construct($website);

        $this->e = $e;
    }
}
