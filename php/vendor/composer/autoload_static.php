<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite05f55b8f1d8c24d20bf91a0a8976a74
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
            $loader->prefixLengthsPsr4 = ComposerStaticInite05f55b8f1d8c24d20bf91a0a8976a74::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite05f55b8f1d8c24d20bf91a0a8976a74::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite05f55b8f1d8c24d20bf91a0a8976a74::$classMap;

        }, null, ClassLoader::class);
    }
}
