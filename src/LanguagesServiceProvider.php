<?php

namespace Rdcstarr\Languages;

use Rdcstarr\Languages\Database\Seeders\LanguagesSeeder;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LanguagesServiceProvider extends PackageServiceProvider
{
	/*
	 * This class is a Package Service Provider
	 *
	 * More info: https://github.com/spatie/laravel-package-tools
	 */
	public function configurePackage(Package $package): void
	{
		$package
			->name('laravel-languages')
			->discoversMigrations()
			->runsMigrations()
			->hasInstallCommand(function (InstallCommand $command)
			{
				$command
					->publishMigrations()
					->askToRunMigrations()
					->endWith(function (InstallCommand $command)
					{
						$command->call('db:seed', [
							'--class' => LanguagesSeeder::class,
						]);
					});
			});
	}
}
