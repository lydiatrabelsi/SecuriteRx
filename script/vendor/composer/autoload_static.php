<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9c3b16a3f0f63e12a3d9f452727e447f
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'ReCaptcha\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ReCaptcha\\' => 
        array (
            0 => __DIR__ . '/..' . '/google/recaptcha/src/ReCaptcha',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9c3b16a3f0f63e12a3d9f452727e447f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9c3b16a3f0f63e12a3d9f452727e447f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9c3b16a3f0f63e12a3d9f452727e447f::$classMap;

        }, null, ClassLoader::class);
    }
}
