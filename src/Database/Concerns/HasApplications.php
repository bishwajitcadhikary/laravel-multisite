<?php

namespace WovoSoft\MultiSite\Database\Concerns;

use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasApplications
{
    public function applications(): HasMany
    {
        return $this->hasMany(
            config('multisite.database.models.application'),
            config('multisite.database.foreign_keys.connectivity_id')
        );
    }
}
