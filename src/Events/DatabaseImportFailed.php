<?php

namespace WovoSoft\MultiSite\Events;

use Illuminate\Foundation\Events\Dispatchable;

class DatabaseImportFailed
{
    use Dispatchable;

    public function __construct()
    {
    }
}
