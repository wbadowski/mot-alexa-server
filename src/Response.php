<?php
/**
 * @package Advanced
 * If you want more control, look through these classes.
 */
namespace MayBeTall\Alexa\Endpoint;

/**
 * Handles the JSON response given back to the Alexa skill.
 * @link https://developer.amazon.com/public/solutions/alexa/alexa-skills-kit/docs/alexa-skills-kit-interface-reference#response-format Alexa Skill Response Format
 */
class Response
{
    /**
     * The response body.
     * @var object
     */
    protected static $body;

    /**
     * Inits/Resets the response.
     * @param object $sessionAttributes The session attributes received in the response.
     */
    public static function init($sessionAttributes = null)
    {
        if ($sessionAttributes == null) {
            $sessionAttributes = (object) array();
        }

        // Init the response body
        self::$body = (object) array(
            'version'=>'1.0',
            'sessionAttributes'=>$sessionAttributes
        );
    }

    /**
     * Adds a session attribute to the response.
     * @param string $key The key used to retrieve the value later.
     * @param mixed $value The value to remember.
     * @link https://developer.amazon.com/public/solutions/alexa/alexa-skills-kit/docs/alexa-skills-kit-interface-reference#response-parameters Alexa Skill Response Parameters
     */
    public static function addSessionAttribute($key, $value)
    {
        self::$body->sessionAttributes->$key = $value;
    }

    /**
     * Adds session attributes to the response.
     * @param  object $data An object to be appended to the response body.
     * @link https://developer.amazon.com/public/solutions/alexa/alexa-skills-kit/docs/alexa-skills-kit-interface-reference#response-parameters Alexa Skill Response Parameters
     */
    public static function addSessionAttributes($values)
    {
        foreach ($values as $key => $value) {
            self::$body->sessionAttributes->$key = $value;
        }
    }

    /**
     * Gets session attributes.
     * @param  string $attribute The attribute to get.
     * @return mixed The value of the attribute, or null if it didn't exist.
     */
    public static function getSessionAttribute($attribute)
    {
        if (property_exists(self::$body->sessionAttributes, $attribute)) {
            return self::$body->sessionAttributes->$attribute;
        } else {
            return null;
        }
    }

    /**
     * Removes a session attribute. Or all, if no argument is passed
     * @param  string $attribute The attribute to remove.
     */
    public static function removeSessionAttribute($attribute = null)
    {
        if ($attribute === null) {
            self::$body->sessionAttributes = (object) array();
        } else if (property_exists(self::$body->sessionAttributes, $attribute)) {
            self::$body->sessionAttributes->$attribute = null;
        }
    }

    /**
     * Appends an object to the response body.
     * @param  object $data An object to be appended to the response body.
     * @link https://developer.amazon.com/public/solutions/alexa/alexa-skills-kit/docs/alexa-skills-kit-interface-reference#response-format Alexa Skill Response Format
     */
    public static function append($data)
    {
        foreach ($data as $key => $value) {
            self::$body->$key = $value;
        }
    }

    /**
     * Sends the responce to the Alexa skill
     */
    public static function send()
    {
        $output = json_encode(self::$body);
        header('HTTP/1.1 200 OK');
        header('Content-Type: application/json;charset=UTF-8');
        header('Content-Length:' . strlen($output));
        echo $output;
    }
}
