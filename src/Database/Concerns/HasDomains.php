<?php

namespace KinDigi\MultiSite\Database\Concerns;

use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasDomains
{
    public function domains(): HasMany
    {
        return $this->hasMany(
            config('multisite.database.models.domain'),
            config('multisite.database.foreign_keys.website_id')
        );
    }
}
