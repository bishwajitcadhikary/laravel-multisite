<?php

namespace WovoSoft\MultiSite\Database\Models;

use Illuminate\Database\Eloquent\Model;
use WovoSoft\MultiSite\Contracts;

class Application extends Model implements Contracts\Application
{
    protected $guarded = [];

    public function __construct(array $attributes = [])
    {
        $this->setTable(config('multisite.database.tables.applications'));

        parent::__construct($attributes);
    }
}
