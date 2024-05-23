<?php

return [
    'database' => [
        'tables' => [
            'connectivities' => 'connectivities',
            'applications' => 'applications',
            'websites' => 'websites',
            'domains' => 'domains',
        ],
        'foreign_keys' => [
            'connectivity_id' => 'connectivity_id',
            'application_id' => 'application_id',
            'website_id' => 'website_id',
            'domain_id' => 'domain_id',
        ],
        'models' => [
            'connectivity' => 'WovoSoft\MultiSite\Models\Connectivity',
            'application' => 'WovoSoft\MultiSite\Models\Application',
            'website' => 'WovoSoft\MultiSite\Models\Website',
            'domain' => 'WovoSoft\MultiSite\Models\Domain',
        ],
    ]
];
