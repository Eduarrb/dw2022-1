<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit646788d427d76e13bdd82bf41e81a094
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit646788d427d76e13bdd82bf41e81a094::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit646788d427d76e13bdd82bf41e81a094::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit646788d427d76e13bdd82bf41e81a094::$classMap;

        }, null, ClassLoader::class);
    }
}