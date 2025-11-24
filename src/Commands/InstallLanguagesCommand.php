<?php

namespace Rdcstarr\Languages\Commands;

use Artisan;
use Exception;
use Illuminate\Console\Command;
use Rdcstarr\Languages\Database\Seeders\LanguagesSeeder;
use function Laravel\Prompts\confirm;

class InstallLanguagesCommand extends Command
{
	public $signature = 'languages:install';

	public $description = 'Install the base languages into the application';

	/**
	 * Execute the console command.
	 */
	public function handle()
	{
		if (!$this->option('force'))
		{
			if (!confirm("This will publish migrations, run migrations, and seed the languages table. Do you want to continue?"))
			{
				$this->warn('🚫 Multilanguage package installation was canceled.');
				return;
			}
		}

		$this->components->info('Starting Multilanguage Package Installation...');

		$steps = [
			'📄 Publishing seeders' => 'publishSeeders',
			'🏁 Running migrations' => 'runMigrations',
			'🌱 Seeding languages'  => 'runSeeder',
		];

		collect($steps)->each(function ($method, $name)
		{
			try
			{
				$this->components->task($name, fn() => $this->{$method}());
			}
			catch (Exception $e)
			{
				$this->components->error($name . ' failed: ' . $e->getMessage());
				exit;
			}
		});

		$this->components->success('Multilanguage Package Installation Completed Successfully!');
	}

	/**
	 * Publish the seeders.
	 *
	 * @return void
	 */
	protected function publishSeeders()
	{
		Artisan::call('vendor:publish', [
			'--provider' => 'Rdcstarr\Languages\LanguagesServiceProvider',
			'--tag'      => 'seeders',
			'--force'    => true,
		]);
	}

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	protected function runMigrations()
	{
		Artisan::call('migrate');
	}

	/**
	 * Seed the languages table.
	 *
	 * @return void
	 */
	protected function runSeeder()
	{
		$publishedSeederClass = 'Database\\Seeders\\LanguagesSeeder';
		$packageSeederClass   = LanguagesSeeder::class;
		$publishedSeederPath  = database_path('seeders/LanguagesSeeder.php');
		$seederClass          = file_exists($publishedSeederPath) ? $publishedSeederClass : $packageSeederClass;

		Artisan::call('db:seed', [
			'--class' => $seederClass,
		]);
	}
}
