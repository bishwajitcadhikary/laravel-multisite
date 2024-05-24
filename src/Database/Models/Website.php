<?php

namespace WovoSoft\MultiSite\Database\Models;

use Illuminate\Database\Eloquent\Model;
use WovoSoft\MultiSite\Contracts;
use WovoSoft\MultiSite\Database\Concerns;
use WovoSoft\MultiSite\DatabaseConfig;
use WovoSoft\MultiSite\Events;

class Website extends Model implements Contracts\Website
{
    use Concerns\HasDomains,
        Concerns\BelongsToApplication;

    protected $guarded = [];

    public function __construct(array $attributes = [])
    {
        $this->setTable(config('multisite.database.tables.websites'));

        parent::__construct($attributes);
    }

    protected $dispatchesEvents = [
        'saving' => Events\WebsiteSaving::class,
        'saved' => Events\WebsiteSaved::class,
        'creating' => Events\WebsiteCreating::class,
        'created' => Events\WebsiteCreated::class,
        'updating' => Events\WebsiteUpdating::class,
        'updated' => Events\WebsiteUpdated::class,
        'deleting' => Events\WebsiteDeleting::class,
        'deleted' => Events\WebsiteDeleted::class,
    ];

    public function config(): DatabaseConfig
    {
        return new DatabaseConfig($this->application->connectivity, $this);
    }
}
