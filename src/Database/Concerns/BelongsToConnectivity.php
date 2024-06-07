<?php

namespace KinDigi\MultiSite\Database\Concerns;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToConnectivity
{
    public function connectivity(): BelongsTo
    {
        return $this->belongsTo(
            config('multisite.database.models.connectivity'),
            config('multisite.database.foreign_keys.connectivity_id')
        );
    }
}
