<?php

namespace WovoSoft\MultiSite\Database\Models;

use Illuminate\Database\Eloquent\Model;
use WovoSoft\MultiSite\Contracts;
use WovoSoft\MultiSite\Database\Concerns;
use WovoSoft\MultiSite\Events;

class Application extends Model implements Contracts\Application
{
    use Concerns\HasWebsites,
        Concerns\BelongsToConnectivity;

    protected $guarded = [];

    public function __construct(array $attributes = [])
    {
        $this->setTable(config('multisite.database.tables.applications'));

        parent::__construct($attributes);
    }

    protected $dispatchesEvents = [
        'saving' => Events\ApplicationSaving::class,
        'saved' => Events\ApplicationSaved::class,
        'creating' => Events\ApplicationCreating::class,
        'created' => Events\ApplicationCreated::class,
        'updating' => Events\ApplicationUpdating::class,
        'updated' => Events\ApplicationUpdated::class,
        'deleting' => Events\ApplicationDeleting::class,
        'deleted' => Events\ApplicationDeleted::class,
    ];
}
