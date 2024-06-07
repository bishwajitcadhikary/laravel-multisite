<?php

namespace KinDigi\MultiSite\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use KinDigi\MultiSite\Contracts\Website;
use KinDigi\MultiSite\Events\DatabaseImported;
use KinDigi\MultiSite\Events\DatabaseImportFailed;
use KinDigi\MultiSite\Events\DatabaseImporting;

class ImportDatabase implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Website $website;

    public function __construct(Website $website)
    {
        $this->website = $website;
    }

    public function handle(): void
    {
        try {
            event(new DatabaseImporting($this->website));

            $this->website->config()->manager()->importDatabase($this->website);

            event(new DatabaseImported($this->website));
        }catch (\Exception $e) {

            event(new DatabaseImportFailed($this->website, $e));
        }
    }
}
