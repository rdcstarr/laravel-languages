<?php

namespace Rdcstarr\Languages\Observers;

use Rdcstarr\Languages\Events\LanguageCreated;
use Rdcstarr\Languages\Events\LanguageDeleted;
use Rdcstarr\Languages\Events\LanguageUpdated;
use Rdcstarr\Languages\Models\Language;

class LanguageObserver
{
	/**
	 * Handle the Language "created" event.
	 */
	public function created(Language $language): void
	{
		LanguageCreated::dispatch($language);
	}

	/**
	 * Handle the Language "updated" event.
	 */
	public function updated(Language $language): void
	{
		LanguageUpdated::dispatch($language);
	}
	/**
	 * Handle the Language "deleted" event.
	 */
	public function deleted(Language $language): void
	{
		LanguageDeleted::dispatch($language);
	}
}
