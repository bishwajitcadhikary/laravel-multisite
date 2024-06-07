<?php

namespace KinDigi\MultiSite\Database\Models;

use Illuminate\Database\Eloquent\Model;
use KinDigi\MultiSite\Contracts;
use KinDigi\MultiSite\Database\Concerns;
use KinDigi\MultiSite\DatabaseConfig;
use KinDigi\MultiSite\Events;

class Connectivity extends Model implements Contracts\Connectivity
{
    use Concerns\HasApplications;

    protected $guarded = [];

    public function __construct(array $attributes = [])
    {
        $this->setTable(config('multisite.database.tables.connectivities'));

        parent::__construct($attributes);
    }

    public function config(): DatabaseConfig
    {
        return new DatabaseConfig($this);
    }

    protected $dispatchesEvents = [
        'saving' => Events\ConnectivitySaving::class,
        'saved' => Events\ConnectivitySaved::class,
        'creating' => Events\ConnectivityCreating::class,
        'created' => Events\ConnectivityCreated::class,
        'updating' => Events\ConnectivityUpdating::class,
        'updated' => Events\ConnectivityUpdated::class,
        'deleting' => Events\ConnectivityDeleting::class,
        'deleted' => Events\ConnectivityDeleted::class,
    ];
}
