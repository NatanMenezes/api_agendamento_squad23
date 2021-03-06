<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitce298a8bd1c98f2697a3f1f35b743e53
{
    public static $files = array (
        '358a081185da263ce40244d3883a8c39' => __DIR__ . '/../..' . '/source/Config.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Source\\' => 7,
        ),
        'C' => 
        array (
            'CoffeeCode\\DataLayer\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Source\\' => 
        array (
            0 => __DIR__ . '/../..' . '/source',
        ),
        'CoffeeCode\\DataLayer\\' => 
        array (
            0 => __DIR__ . '/..' . '/coffeecode/datalayer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitce298a8bd1c98f2697a3f1f35b743e53::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitce298a8bd1c98f2697a3f1f35b743e53::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitce298a8bd1c98f2697a3f1f35b743e53::$classMap;

        }, null, ClassLoader::class);
    }
}
