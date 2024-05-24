<?php

namespace WovoSoft\MultiSite\Database\Models;

use Illuminate\Database\Eloquent\Model;
use WovoSoft\MultiSite\Contracts;
use WovoSoft\MultiSite\Database\Concerns;
use WovoSoft\MultiSite\DatabaseConfig;
use WovoSoft\MultiSite\Events;

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
