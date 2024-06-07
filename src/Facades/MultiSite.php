<?php

namespace KinDigi\MultiSite\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \KinDigi\MultiSite\MultiSite
 */
class MultiSite extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \KinDigi\MultiSite\MultiSite::class;
    }
}
