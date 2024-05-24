<?php

namespace WovoSoft\MultiSite\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use WovoSoft\MultiSite\Contracts\Website;
use WovoSoft\MultiSite\Database\DatabaseManager;
use WovoSoft\MultiSite\Events\DatabaseCreated;
use WovoSoft\MultiSite\Events\DatabaseCreating;
use WovoSoft\MultiSite\Exceptions\DatabaseAlreadyExistsException;
use WovoSoft\MultiSite\Exceptions\DatabaseManagerNotRegisteredException;

class CreateDatabase implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Model|Website
     */
    protected Model|Website $website;

    public function __construct(Website $website)
    {
        $this->website = $website;
    }

    /**
     * @throws DatabaseManagerNotRegisteredException
     * @throws DatabaseAlreadyExistsException
     */
    public function handle(DatabaseManager $manager): void
    {
        event(new DatabaseCreating($this->website));

        $this->website->config()->makeCredentials();
        $manager->ensureWebsiteCanBeCreated($this->website);
        $this->website->config()->manager()->createDatabase($this->website);

        event(new DatabaseCreated($this->website));
    }
}
