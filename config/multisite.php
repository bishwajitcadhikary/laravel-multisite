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
            'connectivity' => 'KinDigi\MultiSite\Database\Models\Connectivity',
            'application' => 'KinDigi\MultiSite\Database\Models\Application',
            'website' => 'KinDigi\MultiSite\Database\Models\Website',
            'domain' => 'KinDigi\MultiSite\Database\Models\Domain',
        ],
        'managers' => [
            'mysql' => 'KinDigi\MultiSite\Database\Managers\MySQLDatabaseManager',
        ]
    ]
];
