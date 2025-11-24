<?php

namespace Rdcstarr\Languages;

use Rdcstarr\Languages\Commands\InstallLanguagesCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LanguagesServiceProvider extends PackageServiceProvider
{
	public function configurePackage(Package $package): void
	{
		/*
		 * This class is a Package Service Provider
		 *
		 * More info: https://github.com/spatie/laravel-package-tools
		 */
		$package
			->name('laravel-languages')
			->hasMigration('create_laravel_languages_table')
			->hasCommand(InstallLanguagesCommand::class);
	}
}
