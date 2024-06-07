<?php

namespace KinDigi\MultiSite\Database\Models;

use Illuminate\Database\Eloquent\Model;
use KinDigi\MultiSite\Contracts;
use KinDigi\MultiSite\Database\Concerns;
use KinDigi\MultiSite\Events;

class Domain extends Model implements Contracts\Domain
{
    use Concerns\BelongsToWebsite;

    protected $guarded = [];


    public function __construct(array $attributes = [])
    {
        $this->setTable(config('multisite.database.tables.domains'));

        parent::__construct($attributes);
    }

    protected $dispatchesEvents = [
        'saving' => Events\DomainSaving::class,
        'saved' => Events\DomainSaved::class,
        'creating' => Events\DomainCreating::class,
        'created' => Events\DomainCreated::class,
        'updating' => Events\DomainUpdating::class,
        'updated' => Events\DomainUpdated::class,
        'deleting' => Events\DomainDeleting::class,
        'deleted' => Events\DomainDeleted::class,
    ];
}
