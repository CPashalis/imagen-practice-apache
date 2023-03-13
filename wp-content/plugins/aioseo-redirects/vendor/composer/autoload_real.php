<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitfe99e7886a21b6265e246f6a04d45153
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

        spl_autoload_register(array('ComposerAutoloaderInitfe99e7886a21b6265e246f6a04d45153', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitfe99e7886a21b6265e246f6a04d45153', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitfe99e7886a21b6265e246f6a04d45153::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
