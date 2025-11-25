<?php

namespace Rdcstarr\Languages\Commands;

use Artisan;
use Exception;
use Illuminate\Console\Command;
use Rdcstarr\Languages\Database\Seeders\LanguagesSeeder;
use function Laravel\Prompts\confirm;

class InstallLanguagesCommand extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	public $signature = 'languages:install
		{--force : Force the installation without confirmation}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	public $description = 'Install the languages package.';

	/**
	 * Execute the console command.
	 */
	public function handle()
	{
		if (!$this->option('force'))
		{
			if (!confirm('This will publish migrations, run migrations, and seed the languages table. Do you want to continue?'))
			{
				$this->components->warn('Installation cancelled.');
				return;
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
				return;
			}
		}

		$this->components->success('Languages Package Installation Completed Successfully!');
	}

	/**
	 * Publish the migrations.
	 */
	protected function publishMigrations(): void
	{
		Artisan::call('vendor:publish', [
			'--provider' => 'Rdcstarr\Languages\LanguagesServiceProvider',
			'--tag'      => 'laravel-languages-migrations',
		]);
	}

	/**
	 * Run the migrations.
	 */
	protected function runMigrations(): void
	{
		Artisan::call('migrate');
	}

	/**
	 * Run the languages seeder.
	 */
	protected function runSeeder(): void
	{
		Artisan::call('db:seed', [
			'--class' => LanguagesSeeder::class,
		]);
	}
}
