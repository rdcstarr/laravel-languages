<?php

namespace Rdcstarr\Languages\Models;

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

	public $timestamps = false;
}
