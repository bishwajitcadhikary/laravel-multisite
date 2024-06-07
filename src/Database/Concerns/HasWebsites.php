<?php

namespace KinDigi\MultiSite\Database\Concerns;

use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasWebsites
{
    public function websites(): HasMany
    {
        return $this->hasMany(
            config('multisite.database.models.website'),
            config('multisite.database.foreign_keys.application_id')
        );
    }
}
