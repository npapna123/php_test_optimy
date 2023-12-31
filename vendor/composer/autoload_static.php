<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf4be03ea22e2e4a206b7b435a0cf210d
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitf4be03ea22e2e4a206b7b435a0cf210d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf4be03ea22e2e4a206b7b435a0cf210d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf4be03ea22e2e4a206b7b435a0cf210d::$classMap;

        }, null, ClassLoader::class);
    }
}
