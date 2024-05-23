<?php

namespace WovoSoft\MultiSite\Database\Models;

use Illuminate\Database\Eloquent\Model;
use WovoSoft\MultiSite\Contracts;

class Website extends Model implements Contracts\Website
{
    protected $guarded = [];

    public function __construct(array $attributes = [])
    {
        $this->setTable(config('multisite.database.tables.websites'));

        parent::__construct($attributes);
    }
}
