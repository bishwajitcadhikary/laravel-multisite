<?php

namespace KinDigi\MultiSite\Events\Contracts;

use Illuminate\Queue\SerializesModels;
use KinDigi\MultiSite\Contracts\Website;

class WebsiteEvent
{
    use SerializesModels;

    /** @var Website */
    public Website $website;

    public function __construct(Website $website)
    {
        $this->website = $website;
    }
}
