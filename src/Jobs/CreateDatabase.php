<?php

namespace KinDigi\MultiSite\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use KinDigi\MultiSite\Contracts\Website;
use KinDigi\MultiSite\Database\DatabaseManager;
use KinDigi\MultiSite\Events\DatabaseCreated;
use KinDigi\MultiSite\Events\DatabaseCreating;
use KinDigi\MultiSite\Exceptions\DatabaseAlreadyExistsException;
use KinDigi\MultiSite\Exceptions\DatabaseManagerNotRegisteredException;

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
