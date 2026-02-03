<?php

namespace Rdcstarr\Languages\Events;

use Rdcstarr\Languages\Models\Language;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LanguageUpdated
{
	use Dispatchable, InteractsWithSockets, SerializesModels;

	/**
	 * Create a new event instance.
	 *
	 * @param Language $language The updated language
	 */
	public function __construct(
		public readonly Language $language,
	) {
		//
	}
}
