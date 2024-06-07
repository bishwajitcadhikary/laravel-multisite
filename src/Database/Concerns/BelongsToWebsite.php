<?php

namespace KinDigi\MultiSite\Database\Concerns;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToWebsite
{
    public function website(): BelongsTo
    {
        return $this->belongsTo(
            config('multisite.database.models.website'),
            config('multisite.database.foreign_keys.website_id')
        );
    }
}
