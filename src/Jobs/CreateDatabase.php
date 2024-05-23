<?php

namespace WovoSoft\MultiSite\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use WovoSoft\MultiSite\Contracts\ConnectivityWithDatabaseConfig;
use WovoSoft\MultiSite\Events\DatabaseCreated;
use WovoSoft\MultiSite\Events\DatabaseCreating;

class CreateDatabase implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var ConnectivityWithDatabaseConfig|Model
     */
    protected ConnectivityWithDatabaseConfig|Model $website;

    public function __construct(ConnectivityWithDatabaseConfig $website)
    {
        $this->website = $website;
    }

    public function handle(): void
    {
        event(new DatabaseCreating($this->website));

        // Create a new database for the website

        event(new DatabaseCreated($this->website));
    }
}
