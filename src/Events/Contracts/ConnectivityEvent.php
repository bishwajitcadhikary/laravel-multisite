<?php

namespace KinDigi\MultiSite\Events\Contracts;

use Illuminate\Queue\SerializesModels;
use KinDigi\MultiSite\Contracts\Connectivity;

abstract class ConnectivityEvent
{
    use SerializesModels;

    /** @var Connectivity */
    public Connectivity $connectivity;

    public function __construct(Connectivity $connectivity)
    {
        $this->connectivity = $connectivity;
    }
}
