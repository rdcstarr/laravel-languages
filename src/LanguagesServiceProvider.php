<?php

namespace Rdcstarr\Languages;

use Rdcstarr\Languages\Commands\InstallLanguagesCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LanguagesServiceProvider extends PackageServiceProvider
{
	public function configurePackage(Package $package): void
	{
		$package
			->name('laravel-languages')
			->hasMigration('create_languages_table')
			->hasCommand(InstallLanguagesCommand::class);
	}
}
