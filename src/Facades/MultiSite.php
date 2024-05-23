<?php

namespace WovoSoft\MultiSite\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \WovoSoft\MultiSite\MultiSite
 */
class MultiSite extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \WovoSoft\MultiSite\MultiSite::class;
    }
}
