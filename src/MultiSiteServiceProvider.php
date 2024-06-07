<?php

namespace KinDigi\MultiSite;

use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class MultiSiteServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('multisite')
            ->hasConfigFile()
            ->hasMigration('create_connectivities_table')
            ->hasMigration('create_applications_table')
            ->hasMigration('create_websites_table')
            ->hasMigration('create_domains_table')
            ->publishesServiceProvider('MultiSiteServiceProvider')
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->startWith(function (InstallCommand $command) {
                        $command->info('Hello, thank you for using Laravel MultiSite!');
                    })
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->copyAndRegisterServiceProviderInApp()
                    ->endWith(function (InstallCommand $command) {
                        $command->info('Goodbye, thank you for using Laravel MultiSite!');
                    });
            });
    }
}
