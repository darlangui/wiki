<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf1f77f0442e0e8c7a1d5994cda6223b9
{
    public static $prefixLengthsPsr4 = array (
        'p' => 
        array (
            'pdo\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'pdo\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf1f77f0442e0e8c7a1d5994cda6223b9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf1f77f0442e0e8c7a1d5994cda6223b9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf1f77f0442e0e8c7a1d5994cda6223b9::$classMap;

        }, null, ClassLoader::class);
    }
}
