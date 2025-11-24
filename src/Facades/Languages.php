<?php

namespace Rdcstarr\Languages\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Rdcstarr\Languages\LanguagesService
 */
class Languages extends Facade
{
	protected static function getFacadeAccessor(): string
	{
		return \Rdcstarr\Languages\LanguagesService::class;
	}
}
