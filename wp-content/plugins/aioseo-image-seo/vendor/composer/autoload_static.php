<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5aa2995027814c57269e791f068724d3
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'AIOSEO\\Plugin\\Addon\\ImageSeo\\' => 29,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'AIOSEO\\Plugin\\Addon\\ImageSeo\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5aa2995027814c57269e791f068724d3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5aa2995027814c57269e791f068724d3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5aa2995027814c57269e791f068724d3::$classMap;

        }, null, ClassLoader::class);
    }
}
