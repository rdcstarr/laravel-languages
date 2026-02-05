<?php

namespace Rdcstarr\Languages\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Rdcstarr\Languages\Observers\LanguageObserver;

#[ObservedBy([LanguageObserver::class])]
class Language extends Model
{
	protected $fillable = [
		'name',
		'code',
		'flag',
		'timezone',
		'enabled',
		'default',
	];

	protected $casts = [
		'enabled' => 'boolean',
		'default' => 'boolean',
	];

	/**
	 * Scope a query to only include enabled (or disabled) languages.
	 *
	 * @param Builder $query
	 * @param bool $enabled
	 * @return Builder
	 */
	public function scopeEnabled(Builder $query, bool $enabled = true): Builder
	{
		return $query->where('enabled', $enabled);
	}

	/**
	 * Scope a query to only include the default (or non-default) language.
	 *
	 * @param Builder $query
	 * @param bool $default
	 * @return Builder
	 */
	public function scopeDefault(Builder $query, bool $default = true): Builder
	{
		return $query->where('default', $default);
	}

	/**
	 * Get a map of enabled language codes to IDs.
	 *
	 * @return array<string, int>
	 */
	public static function enabledCodeToId(): array
	{
		return static::query()
			->enabled()
			->pluck('id', 'code')
			->map(fn ($id) => (int) $id)
			->toArray();
	}

	public $timestamps = false;
}
