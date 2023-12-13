<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit918d27f61756fa2177ebe81e4af0d22a
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit918d27f61756fa2177ebe81e4af0d22a', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit918d27f61756fa2177ebe81e4af0d22a', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit918d27f61756fa2177ebe81e4af0d22a::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}