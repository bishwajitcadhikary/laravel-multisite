<?php

return [
    'database' => [
        'prefix' => 'multisite_',
        'suffix' => null,
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
            'connectivity' => 'WovoSoft\MultiSite\Database\Models\Connectivity',
            'application' => 'WovoSoft\MultiSite\Database\Models\Application',
            'website' => 'WovoSoft\MultiSite\Database\Models\Website',
            'domain' => 'WovoSoft\MultiSite\Database\Models\Domain',
        ],
        'managers' => [
            'mysql' => 'WovoSoft\MultiSite\Database\Managers\MySQLDatabaseManager',
        ]
    ]
];
