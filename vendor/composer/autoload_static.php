<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2d2a5f28cf8c499bfc6b8afc2c7cbd7f
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2d2a5f28cf8c499bfc6b8afc2c7cbd7f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2d2a5f28cf8c499bfc6b8afc2c7cbd7f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
