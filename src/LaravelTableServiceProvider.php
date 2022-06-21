<?php

namespace Luilliarcec\LaravelTable;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelTableServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('tables')
            ->hasConfigFile('tables')
            ->hasTranslations()
            ->hasViews('tables');
    }
}
