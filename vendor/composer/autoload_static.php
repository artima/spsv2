<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitaf1cec3ffac0222d1666d1e6b3f9f751
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'config\\' => 7,
        ),
        'M' => 
        array (
            'Model\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'config\\' => 
        array (
            0 => __DIR__ . '/../..' . '/DatabaseFactory',
        ),
        'Model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Model/Entity',
        ),
    );

    public static $classMap = array (
        'Model\\Entity\\Proposal' => __DIR__ . '/../..' . '/Model/Entity/Proposal.php',
        'Model\\Entity\\User' => __DIR__ . '/../..' . '/Model/Entity/User.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitaf1cec3ffac0222d1666d1e6b3f9f751::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitaf1cec3ffac0222d1666d1e6b3f9f751::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitaf1cec3ffac0222d1666d1e6b3f9f751::$classMap;

        }, null, ClassLoader::class);
    }
}
