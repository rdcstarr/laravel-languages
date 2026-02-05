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
						'name'       => $language['name'],
						'flag'       => $language['flag'] ?? null,
						'flag_name'  => $language['flag_name'] ?? null,
						'flag_emoji' => $language['flag_emoji'] ?? null,
						'timezone'   => $language['timezone'] ?? null,
						'enabled'    => $language['enabled'] ?? false,
						'default'    => $language['default'] ?? false,
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
				'name'       => 'Romanian',
				'code'       => 'ro',
				'flag'       => 'ro',
				'flag_name'  => 'romania',
				'flag_emoji' => '🇷🇴',
				'timezone'   => 'Europe/Bucharest',
			],
			[
				'name'       => 'English',
				'code'       => 'en',
				'flag'       => 'us',
				'flag_name'  => 'united-states',
				'flag_emoji' => '🇺🇸',
				'timezone'   => 'America/New_York',
				'enabled'    => true,
				'default'    => true,
			],
			[
				'name'       => 'German',
				'code'       => 'de',
				'flag'       => 'de',
				'flag_name'  => 'germany',
				'flag_emoji' => '🇩🇪',
				'timezone'   => 'Europe/Berlin',
			],
			[
				'name'       => 'French',
				'code'       => 'fr',
				'flag'       => 'fr',
				'flag_name'  => 'france',
				'flag_emoji' => '🇫🇷',
				'timezone'   => 'Europe/Paris',
			],
			[
				'name'       => 'Spanish',
				'code'       => 'es',
				'flag'       => 'es',
				'flag_name'  => 'spain',
				'flag_emoji' => '🇪🇸',
				'timezone'   => 'Europe/Madrid',
			],
			[
				'name'       => 'Italian',
				'code'       => 'it',
				'flag'       => 'it',
				'flag_name'  => 'italy',
				'flag_emoji' => '🇮🇹',
				'timezone'   => 'Europe/Rome',
			],
			[
				'name'       => 'Portuguese',
				'code'       => 'pt',
				'flag'       => 'pt',
				'flag_name'  => 'portugal',
				'flag_emoji' => '🇵🇹',
				'timezone'   => 'Europe/Lisbon',
			],
			[
				'name'       => 'Dutch',
				'code'       => 'nl',
				'flag'       => 'nl',
				'flag_name'  => 'netherlands',
				'flag_emoji' => '🇳🇱',
				'timezone'   => 'Europe/Amsterdam',
			],
			[
				'name'       => 'Russian',
				'code'       => 'ru',
				'flag'       => 'ru',
				'flag_name'  => 'russia',
				'flag_emoji' => '🇷🇺',
				'timezone'   => 'Europe/Moscow',
			],
			[
				'name'       => 'Polish',
				'code'       => 'pl',
				'flag'       => 'pl',
				'flag_name'  => 'poland',
				'flag_emoji' => '🇵🇱',
				'timezone'   => 'Europe/Warsaw',
			],
			[
				'name'       => 'Ukrainian',
				'code'       => 'uk',
				'flag'       => 'ua',
				'flag_name'  => 'ukraine',
				'flag_emoji' => '🇺🇦',
				'timezone'   => 'Europe/Kyiv',
			],
			[
				'name'       => 'Czech',
				'code'       => 'cs',
				'flag'       => 'cz',
				'flag_name'  => 'czech-republic',
				'flag_emoji' => '🇨🇿',
				'timezone'   => 'Europe/Prague',
			],
			[
				'name'       => 'Hungarian',
				'code'       => 'hu',
				'flag'       => 'hu',
				'flag_name'  => 'hungary',
				'flag_emoji' => '🇭🇺',
				'timezone'   => 'Europe/Budapest',
			],
			[
				'name'       => 'Greek',
				'code'       => 'el',
				'flag'       => 'gr',
				'flag_name'  => 'greece',
				'flag_emoji' => '🇬🇷',
				'timezone'   => 'Europe/Athens',
			],
			[
				'name'       => 'Bulgarian',
				'code'       => 'bg',
				'flag'       => 'bg',
				'flag_name'  => 'bulgaria',
				'flag_emoji' => '🇧🇬',
				'timezone'   => 'Europe/Sofia',
			],
			[
				'name'       => 'Croatian',
				'code'       => 'hr',
				'flag'       => 'hr',
				'flag_name'  => 'croatia',
				'flag_emoji' => '🇭🇷',
				'timezone'   => 'Europe/Zagreb',
			],
			[
				'name'       => 'Serbian',
				'code'       => 'sr',
				'flag'       => 'rs',
				'flag_name'  => 'serbia',
				'flag_emoji' => '🇷🇸',
				'timezone'   => 'Europe/Belgrade',
			],
			[
				'name'       => 'Swedish',
				'code'       => 'sv',
				'flag'       => 'se',
				'flag_name'  => 'sweden',
				'flag_emoji' => '🇸🇪',
				'timezone'   => 'Europe/Stockholm',
			],
			[
				'name'       => 'Norwegian',
				'code'       => 'no',
				'flag'       => 'no',
				'flag_name'  => 'norway',
				'flag_emoji' => '🇳🇴',
				'timezone'   => 'Europe/Oslo',
			],
			[
				'name'       => 'Danish',
				'code'       => 'da',
				'flag'       => 'dk',
				'flag_name'  => 'denmark',
				'flag_emoji' => '🇩🇰',
				'timezone'   => 'Europe/Copenhagen',
			],
			[
				'name'       => 'Finnish',
				'code'       => 'fi',
				'flag'       => 'fi',
				'flag_name'  => 'finland',
				'flag_emoji' => '🇫🇮',
				'timezone'   => 'Europe/Helsinki',
			],
			[
				'name'       => 'Turkish',
				'code'       => 'tr',
				'flag'       => 'tr',
				'flag_name'  => 'turkey',
				'flag_emoji' => '🇹🇷',
				'timezone'   => 'Europe/Istanbul',
			],
			[
				'name'       => 'Arabic',
				'code'       => 'ar',
				'flag'       => 'sa',
				'flag_name'  => 'saudi-arabia',
				'flag_emoji' => '🇸🇦',
				'timezone'   => 'Asia/Riyadh',
			],
			[
				'name'       => 'Hebrew',
				'code'       => 'he',
				'flag'       => 'il',
				'flag_name'  => 'israel',
				'flag_emoji' => '🇮🇱',
				'timezone'   => 'Asia/Jerusalem',
			],
			[
				'name'       => 'Persian',
				'code'       => 'fa',
				'flag'       => 'ir',
				'flag_name'  => 'iran',
				'flag_emoji' => '🇮🇷',
				'timezone'   => 'Asia/Tehran',
			],
			[
				'name'       => 'Hindi',
				'code'       => 'hi',
				'flag'       => 'in',
				'flag_name'  => 'india',
				'flag_emoji' => '🇮🇳',
				'timezone'   => 'Asia/Kolkata',
			],
			[
				'name'       => 'Bengali',
				'code'       => 'bn',
				'flag'       => 'bd',
				'flag_name'  => 'bangladesh',
				'flag_emoji' => '🇧🇩',
				'timezone'   => 'Asia/Dhaka',
			],
			[
				'name'       => 'Urdu',
				'code'       => 'ur',
				'flag'       => 'pk',
				'flag_name'  => 'pakistan',
				'flag_emoji' => '🇵🇰',
				'timezone'   => 'Asia/Karachi',
			],
			[
				'name'       => 'Chinese',
				'code'       => 'zh',
				'flag'       => 'cn',
				'flag_name'  => 'china',
				'flag_emoji' => '🇨🇳',
				'timezone'   => 'Asia/Shanghai',
			],
			[
				'name'       => 'Japanese',
				'code'       => 'ja',
				'flag'       => 'jp',
				'flag_name'  => 'japan',
				'flag_emoji' => '🇯🇵',
				'timezone'   => 'Asia/Tokyo',
			],
			[
				'name'       => 'Korean',
				'code'       => 'ko',
				'flag'       => 'kr',
				'flag_name'  => 'south-korea',
				'flag_emoji' => '🇰🇷',
				'timezone'   => 'Asia/Seoul',
			],
			[
				'name'       => 'Thai',
				'code'       => 'th',
				'flag'       => 'th',
				'flag_name'  => 'thailand',
				'flag_emoji' => '🇹🇭',
				'timezone'   => 'Asia/Bangkok',
			],
			[
				'name'       => 'Vietnamese',
				'code'       => 'vi',
				'flag'       => 'vn',
				'flag_name'  => 'vietnam',
				'flag_emoji' => '🇻🇳',
				'timezone'   => 'Asia/Ho_Chi_Minh',
			],
			[
				'name'       => 'Indonesian',
				'code'       => 'id',
				'flag'       => 'id',
				'flag_name'  => 'indonesia',
				'flag_emoji' => '🇮🇩',
				'timezone'   => 'Asia/Jakarta',
			],
			[
				'name'       => 'Malay',
				'code'       => 'ms',
				'flag'       => 'my',
				'flag_name'  => 'malaysia',
				'flag_emoji' => '🇲🇾',
				'timezone'   => 'Asia/Kuala_Lumpur',
			],
			[
				'name'       => 'Filipino',
				'code'       => 'tl',
				'flag'       => 'ph',
				'flag_name'  => 'philippines',
				'flag_emoji' => '🇵🇭',
				'timezone'   => 'Asia/Manila',
			],
		];
	}
}
