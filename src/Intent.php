<?php
/**
 * @package Advanced
 * If you want more control, look through these classes.
 */
namespace MayBeTall\Alexa\Endpoint;

/**
 * Handles intents defined in the Alexa Skill Builder.
 * @link https://developer.amazon.com/public/solutions/alexa/alexa-skills-kit/docs/alexa-skills-kit-interaction-model-reference#intent-schema-parameters Alexa Documentation On Intents
*/
class Intent
{
    /**
     * The name of the intent.
     * @var string
     */
    protected static $name;
    /**
     * The slots sent by the Alexa Skill
     * @var object
     */
    protected static $slots;

    /**
     * @param object $intent The object derived from Alexa's JSON payload
     */
    public static function init($intent)
    {
        self::$name = $intent->name;
        if (property_exists($intent, 'slots')) {
            self::$slots = $intent->slots;
        }
    }

    /**
     * Get the name of the intent.
     * @return string The intent name
     */
    public static function name()
    {
        return self::$name;
    }

    /**
     * Get the slots in the intent.
     * @return object The slots in the intent
     */
    public static function slots()
    {
        return self::$slots;
    }

    /**
     * Check if a slot exists in the intent.
     * @param  string $slot The name of the slot to check for.
     * @return boolean Returns true if the slot has a value, false otherwise.
     */
    public static function hasSlot($slot)
    {
        return property_exists(self::$slots, $slot) && property_exists(self::$slots->{$slot}, "value");
    }

    /**
     * Gets the value of an intent slot.
     * @param  string $slot The name of the slot to check for.
     * @return mixed The value of the intent slot, or null if not found.
     */
    public static function getSlot($slot)
    {
        if (self::hasSlot($slot)) {
            error_log($slot);
            return self::$slots->{$slot}->value;
        } else {
            return null;
        }
    }

    /**
     * @param  string $name The name of the intent to listen for.
     * @param  callable $callback The callback function to run if the intent is called.
     */
    public static function listen($name, $callback)
    {
        if ($name == self::$name) {
            $callback();
        }
    }
}
