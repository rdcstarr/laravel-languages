<?php

namespace Rdcstarr\Languages\Database\Seeders;

use Exception;
use Illuminate\Database\Seeder;
use Rdcstarr\Languages\Models\Language;

class LanguagesSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		try
		{
			collect($this->languages())->each(function (array $language): void
			{
				Language::updateOrCreate(
					['code' => $language['code']],
					[
						'name'     => $language['name'],
						'flag'     => $language['flag'] ?? null,
						'timezone' => $language['timezone'] ?? null,
					]
				);
			});
		}
		catch (Exception $e)
		{
			$this->command->error('Seeding failed: ' . $e->getMessage());
		}
	}

	/**
	 * List of base languages used in the application.
	 *
	 * @return array
	 */
	private function languages(): array
	{
		return [
			[
				'name'     => 'Romanian',
				'code'     => 'ro',
				'flag'     => 'ro',
				'timezone' => 'Europe/Bucharest',
			],
			[
				'name'     => 'English',
				'code'     => 'en',
				'flag'     => 'us',
				'timezone' => 'America/New_York',
				'enabled'  => true,
			],
			[
				'name'     => 'German',
				'code'     => 'de',
				'flag'     => 'de',
				'timezone' => 'Europe/Berlin',
			],
			[
				'name'     => 'French',
				'code'     => 'fr',
				'flag'     => 'fr',
				'timezone' => 'Europe/Paris',
			],
			[
				'name'     => 'Spanish',
				'code'     => 'es',
				'flag'     => 'es',
				'timezone' => 'Europe/Madrid',
			],
			[
				'name'     => 'Italian',
				'code'     => 'it',
				'flag'     => 'it',
				'timezone' => 'Europe/Rome',
			],
			[
				'name'     => 'Portuguese',
				'code'     => 'pt',
				'flag'     => 'pt',
				'timezone' => 'Europe/Lisbon',
			],
			[
				'name'     => 'Dutch',
				'code'     => 'nl',
				'flag'     => 'nl',
				'timezone' => 'Europe/Amsterdam',
			],
			[
				'name'     => 'Russian',
				'code'     => 'ru',
				'flag'     => 'ru',
				'timezone' => 'Europe/Moscow',
			],
			[
				'name'     => 'Polish',
				'code'     => 'pl',
				'flag'     => 'pl',
				'timezone' => 'Europe/Warsaw',
			],
			[
				'name'     => 'Ukrainian',
				'code'     => 'uk',
				'flag'     => 'ua',
				'timezone' => 'Europe/Kyiv',
			],
			[
				'name'     => 'Czech',
				'code'     => 'cs',
				'flag'     => 'cz',
				'timezone' => 'Europe/Prague',
			],
			[
				'name'     => 'Hungarian',
				'code'     => 'hu',
				'flag'     => 'hu',
				'timezone' => 'Europe/Budapest',
			],
			[
				'name'     => 'Greek',
				'code'     => 'el',
				'flag'     => 'gr',
				'timezone' => 'Europe/Athens',
			],
			[
				'name'     => 'Bulgarian',
				'code'     => 'bg',
				'flag'     => 'bg',
				'timezone' => 'Europe/Sofia',
			],
			[
				'name'     => 'Croatian',
				'code'     => 'hr',
				'flag'     => 'hr',
				'timezone' => 'Europe/Zagreb',
			],
			[
				'name'     => 'Serbian',
				'code'     => 'sr',
				'flag'     => 'rs',
				'timezone' => 'Europe/Belgrade',
			],
			[
				'name'     => 'Swedish',
				'code'     => 'sv',
				'flag'     => 'se',
				'timezone' => 'Europe/Stockholm',
			],
			[
				'name'     => 'Norwegian',
				'code'     => 'no',
				'flag'     => 'no',
				'timezone' => 'Europe/Oslo',
			],
			[
				'name'     => 'Danish',
				'code'     => 'da',
				'flag'     => 'dk',
				'timezone' => 'Europe/Copenhagen',
			],
			[
				'name'     => 'Finnish',
				'code'     => 'fi',
				'flag'     => 'fi',
				'timezone' => 'Europe/Helsinki',
			],
			[
				'name'     => 'Turkish',
				'code'     => 'tr',
				'flag'     => 'tr',
				'timezone' => 'Europe/Istanbul',
			],
			[
				'name'     => 'Arabic',
				'code'     => 'ar',
				'flag'     => 'sa',
				'timezone' => 'Asia/Riyadh',
			],
			[
				'name'     => 'Hebrew',
				'code'     => 'he',
				'flag'     => 'il',
				'timezone' => 'Asia/Jerusalem',
			],
			[
				'name'     => 'Persian',
				'code'     => 'fa',
				'flag'     => 'ir',
				'timezone' => 'Asia/Tehran',
			],
			[
				'name'     => 'Hindi',
				'code'     => 'hi',
				'flag'     => 'in',
				'timezone' => 'Asia/Kolkata',
			],
			[
				'name'     => 'Bengali',
				'code'     => 'bn',
				'flag'     => 'bd',
				'timezone' => 'Asia/Dhaka',
			],
			[
				'name'     => 'Urdu',
				'code'     => 'ur',
				'flag'     => 'pk',
				'timezone' => 'Asia/Karachi',
			],
			[
				'name'     => 'Chinese',
				'code'     => 'zh',
				'flag'     => 'cn',
				'timezone' => 'Asia/Shanghai',
			],
			[
				'name'     => 'Japanese',
				'code'     => 'ja',
				'flag'     => 'jp',
				'timezone' => 'Asia/Tokyo',
			],
			[
				'name'     => 'Korean',
				'code'     => 'ko',
				'flag'     => 'kr',
				'timezone' => 'Asia/Seoul',
			],
			[
				'name'     => 'Thai',
				'code'     => 'th',
				'flag'     => 'th',
				'timezone' => 'Asia/Bangkok',
			],
			[
				'name'     => 'Vietnamese',
				'code'     => 'vi',
				'flag'     => 'vn',
				'timezone' => 'Asia/Ho_Chi_Minh',
			],
			[
				'name'     => 'Indonesian',
				'code'     => 'id',
				'flag'     => 'id',
				'timezone' => 'Asia/Jakarta',
			],
			[
				'name'     => 'Malay',
				'code'     => 'ms',
				'flag'     => 'my',
				'timezone' => 'Asia/Kuala_Lumpur',
			],
			[
				'name'     => 'Filipino',
				'code'     => 'tl',
				'flag'     => 'ph',
				'timezone' => 'Asia/Manila',
			],
		];
	}
}
