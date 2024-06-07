<?php

namespace KinDigi\MultiSite\Events\Contracts;

use Illuminate\Queue\SerializesModels;
use KinDigi\MultiSite\Contracts\Application;

class ApplicationEvent
{
    use SerializesModels;

    /** @var Application */
    public Application $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }
}
