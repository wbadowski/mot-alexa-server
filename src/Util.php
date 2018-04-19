<?php
/**
 * @package Simple
 * Classes intended to make everything simple
 */
namespace MayBeTall\Alexa\Endpoint;

/**
 * Provides utility functions.
 */
class Util
{
    /**
     * Compares two strings by how similar they sound.
     * @param  string $str1 The primary string
     * @param  string $str2 The secondary string
     * @return float A value between 0-1, indicating how close the two strings sound.
     */
    public static function compareString($str1, $str2)
    {
        $str1_metaphone = metaphone($str1);
        $str2_metaphone = metaphone($str2);

         $levenshtein = levenshtein($str1_metaphone, $str2_metaphone);

         $ratio = (1 - ($levenshtein / strlen($str1_metaphone))) * 100;

         return $ratio;
    }

    /**
     * Finds the most similar sounding value to $needle in $haystack.
     * @param  string $needle The string to compare
     * @param  object $haystack The object to search
     * @param  string $prop The property of the object to compare, if the string value is nested inside the object.
     * @param  float $threshold A value 0-1 defining how close a match must sound be to be considered.
     * @return mixed Returns a string, an object, or null.
     */
    public static function bestMatch($needle, $haystack, $prop = null, $threshold = 0.7)
    {
        $highest = $threshold;
        $match = null;
        foreach ($haystack as $key => $value) {
            if ($prop) {
                $search = $value->$prop;
            } else {
                $search = $value;
            }
            $ratio = self::compareString($needle, $search);
            if ($ratio > $highest) {
                $highest = $ratio;
                $match = $value;
            }
        }
        return $match;
    }
}
