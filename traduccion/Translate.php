<?php
namespace SimpleTranslation;

/**
 * Translate class
 *
 * A simple translation class using PHP arrays.
 *
 * @author      Jordi Bassagañas <info@programarivm.com>
 * @copyright   2014 Jordi Bassagañas
 * @link        http://programarivm.com
 */
class Translate
{
    /**
     * @var stdClass Config object
     */
    protected static $conf;
    /**
     * Init method
     * @param string $locale Target language
     * @param string $path Dictionary path
     */
    public static function init($locale = null, $path = null)
    {
        self::$conf = new \stdClass;
        self::setLocale($locale);
        self::setDictionary($path);
    }
    /**
     * Sets the current locale
     * @param string $locale
     */
    private static function setLocale($locale = null)
    {
        isset($locale)
        ? self::$conf->locale = $locale
        : self::$conf->locale = null;
    }
    /**
     * Sets the dictionary path
     * @param string $path
     */
    private static function setDictionary($path = null)
    {
        isset($path)
        ? self::$conf->dictionary = include $path
        : self::$conf->dictionary = null;
    }
    /**
     * Returns the translated phrase
     * @param string $phrase The original phrase
     * @return string The translated phrase
     */
    public static function __($phrase)
    {
        if (isset(self::$conf->locale) && isset(self::$conf->dictionary)) {
            return self::$conf->dictionary[$phrase];
        } else {
            return $phrase;
        }

    }
}