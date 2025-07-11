<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit941ad0c9c7c963bebd402a9f8be1812a
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

        spl_autoload_register(array('ComposerAutoloaderInit941ad0c9c7c963bebd402a9f8be1812a', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit941ad0c9c7c963bebd402a9f8be1812a', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit941ad0c9c7c963bebd402a9f8be1812a::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
