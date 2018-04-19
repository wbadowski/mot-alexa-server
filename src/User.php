<?php
/**
 * @package Simple
 * Classes intended to make everything simple
 */
namespace MayBeTall\Alexa\Endpoint;

use MayBeTall\Alexa\Endpoint\Intent;

/**
 * Handles the User side of the conversation.
 */
class User
{
	/**
     * Trigger callback when user triggesr intent.
     * @see Intent::listen
	 * @param string $name The name of the intent that fires the callback function.
	 * @param callable $callback The callback function to run when the intent is triggered.
	 */
    public static function triggered($name, $callback = null)
    {
        Intent::listen($name, $callback);
    }

    /**
     * Returns the slot stated by the user.
     * @see Intent::getSlot
     * @param string $slot The slot to look for.
     * @return mixed Returns the value of the intent slot, or null if there was no slot value defined.
     */
    public static function stated($slot)
    {
        return Intent::getSlot($slot);
    }
}
