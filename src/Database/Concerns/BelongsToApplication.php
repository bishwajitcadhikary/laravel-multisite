<?php

namespace WovoSoft\MultiSite\Database\Concerns;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToApplication
{
    /**
     * Get the application that owns the model.
     *
     * @return mixed
     */
    public function application(): BelongsTo
    {
        return $this->belongsTo(
            config('multisite.database.models.application'),
            config('multisite.database.foreign_keys.application_id')
        );
    }
}
