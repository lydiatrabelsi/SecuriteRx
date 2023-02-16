<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit9c3b16a3f0f63e12a3d9f452727e447f
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

        spl_autoload_register(array('ComposerAutoloaderInit9c3b16a3f0f63e12a3d9f452727e447f', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit9c3b16a3f0f63e12a3d9f452727e447f', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit9c3b16a3f0f63e12a3d9f452727e447f::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
