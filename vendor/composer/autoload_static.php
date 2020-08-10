<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6491ef26643e57e36f70d07bc20a60cd
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6491ef26643e57e36f70d07bc20a60cd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6491ef26643e57e36f70d07bc20a60cd::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
