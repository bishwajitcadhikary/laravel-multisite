<?php

namespace KinDigi\MultiSite\Events\Contracts;

use Illuminate\Queue\SerializesModels;
use KinDigi\MultiSite\Contracts\Domain;

class DomainEvent
{
    use SerializesModels;

    /** @var Domain */
    public Domain $domain;

    public function __construct(Domain $domain)
    {
        $this->domain = $domain;
    }
}
