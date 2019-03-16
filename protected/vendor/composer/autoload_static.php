<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc1fa7f8e2590ea02647399ac58a5ec33
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Component\\EventDispatcher\\' => 34,
            'Stripe\\' => 7,
        ),
        'R' => 
        array (
            'Rhumsaa\\Uuid\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Component\\EventDispatcher\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/event-dispatcher',
        ),
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
        'Rhumsaa\\Uuid\\' => 
        array (
            0 => __DIR__ . '/..' . '/rhumsaa/uuid/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'PayPal\\Types' => 
            array (
                0 => __DIR__ . '/..' . '/paypal/adaptivepayments-sdk-php/lib',
            ),
            'PayPal\\Service' => 
            array (
                0 => __DIR__ . '/..' . '/paypal/adaptivepayments-sdk-php/lib',
            ),
            'PayPal' => 
            array (
                0 => __DIR__ . '/..' . '/paypal/sdk-core-php/lib',
            ),
        ),
        'G' => 
        array (
            'Guzzle\\Tests' => 
            array (
                0 => __DIR__ . '/..' . '/guzzle/guzzle/tests',
            ),
            'Guzzle' => 
            array (
                0 => __DIR__ . '/..' . '/guzzle/guzzle/src',
            ),
        ),
        'A' => 
        array (
            'Aws' => 
            array (
                0 => __DIR__ . '/..' . '/aws/aws-sdk-php/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc1fa7f8e2590ea02647399ac58a5ec33::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc1fa7f8e2590ea02647399ac58a5ec33::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitc1fa7f8e2590ea02647399ac58a5ec33::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}