<?php

namespace Rdcstarr\Languages\Commands;

use Artisan;
use Exception;
use Illuminate\Console\Command;
use Rdcstarr\Languages\Database\Seeders\LanguagesSeeder;
use function Laravel\Prompts\confirm;

class InstallLanguagesCommand extends Command
{
	public $signature = 'languages:install
		{--force : Force the installation without confirmation}';

	public $description = 'Install the languages package';

	public function handle(): int
	{
		if (!$this->option('force'))
		{
			if (!confirm('This will publish migrations, run migrations, and seed the languages table. Do you want to continue?'))
			{
				$this->components->warn('Installation cancelled.');
				return self::FAILURE;
			}
		}

		$this->components->info('Starting Languages Package Installation...');

		$steps = [
			'📄 Publishing migrations' => 'publishMigrations',
			'🏁 Running migrations'    => 'runMigrations',
			'🌱 Seeding languages'     => 'runSeeder',
		];

		foreach ($steps as $name => $method)
		{
			try
			{
				$this->components->task($name, fn() => $this->{$method}());
			}
			catch (Exception $e)
			{
				$this->components->error($name . ' failed: ' . $e->getMessage());
				return self::FAILURE;
			}
		}

		$this->components->success('Languages Package Installation Completed Successfully!');

		return self::SUCCESS;
	}

	protected function publishMigrations(): void
	{
		Artisan::call('vendor:publish', [
			'--tag'   => 'laravel-languages-migrations',
			'--force' => true,
		]);
	}

	protected function runMigrations(): void
	{
		Artisan::call('migrate');
	}

	protected function runSeeder(): void
	{
		Artisan::call('db:seed', [
			'--class' => LanguagesSeeder::class,
		]);
	}
}
