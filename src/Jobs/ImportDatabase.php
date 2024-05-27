<?php

namespace WovoSoft\MultiSite\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use WovoSoft\MultiSite\Contracts\Website;
use WovoSoft\MultiSite\Events\DatabaseImported;
use WovoSoft\MultiSite\Events\DatabaseImportFailed;
use WovoSoft\MultiSite\Events\DatabaseImporting;

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
