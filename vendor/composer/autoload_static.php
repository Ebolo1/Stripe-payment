<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb58a97b95e6303c55ae822f3a1c68325
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb58a97b95e6303c55ae822f3a1c68325::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb58a97b95e6303c55ae822f3a1c68325::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb58a97b95e6303c55ae822f3a1c68325::$classMap;

        }, null, ClassLoader::class);
    }
}