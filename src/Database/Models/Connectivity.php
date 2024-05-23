<?php

namespace WovoSoft\MultiSite\Database\Models;

use Illuminate\Database\Eloquent\Model;
use WovoSoft\MultiSite\Contracts;

class Connectivity extends Model implements Contracts\Connectivity
{
    protected $guarded = [];

    public function __construct(array $attributes = [])
    {
        $this->setTable(config('multisite.database.tables.connectivities'));

        parent::__construct($attributes);
    }
}
