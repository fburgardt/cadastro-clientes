<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit64f3d283ba1f4723a427f6b0991b8aa9
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Crmall\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Crmall\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit64f3d283ba1f4723a427f6b0991b8aa9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit64f3d283ba1f4723a427f6b0991b8aa9::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
