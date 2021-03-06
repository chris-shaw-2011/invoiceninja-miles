<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit12ed616919012453b617e8ff03593fe5
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Modules\\Miles\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Modules\\Miles\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Modules\\Miles\\Database\\Seeders\\MilesDatabaseSeeder' => __DIR__ . '/../..' . '/Database/Seeders/MilesDatabaseSeeder.php',
        'Modules\\Miles\\Datatables\\MilesDatatable' => __DIR__ . '/../..' . '/Datatables/MilesDatatable.php',
        'Modules\\Miles\\Http\\ApiControllers\\MilesApiController' => __DIR__ . '/../..' . '/Http/ApiControllers/MilesApiController.php',
        'Modules\\Miles\\Http\\Controllers\\MilesController' => __DIR__ . '/../..' . '/Http/Controllers/MilesController.php',
        'Modules\\Miles\\Http\\Requests\\CreateMilesRequest' => __DIR__ . '/../..' . '/Http/Requests/CreateMilesRequest.php',
        'Modules\\Miles\\Http\\Requests\\MilesRequest' => __DIR__ . '/../..' . '/Http/Requests/MilesRequest.php',
        'Modules\\Miles\\Http\\Requests\\UpdateMilesRequest' => __DIR__ . '/../..' . '/Http/Requests/UpdateMilesRequest.php',
        'Modules\\Miles\\Models\\Miles' => __DIR__ . '/../..' . '/Models/Miles.php',
        'Modules\\Miles\\Policies\\MilesPolicy' => __DIR__ . '/../..' . '/Policies/MilesPolicy.php',
        'Modules\\Miles\\Presenters\\MilesPresenter' => __DIR__ . '/../..' . '/Presenters/MilesPresenter.php',
        'Modules\\Miles\\Providers\\MilesServiceProvider' => __DIR__ . '/../..' . '/Providers/MilesServiceProvider.php',
        'Modules\\Miles\\Repositories\\MilesRepository' => __DIR__ . '/../..' . '/Repositories/MilesRepository.php',
        'Modules\\Miles\\Transformers\\MilesTransformer' => __DIR__ . '/../..' . '/Transformers/MilesTransformer.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit12ed616919012453b617e8ff03593fe5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit12ed616919012453b617e8ff03593fe5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit12ed616919012453b617e8ff03593fe5::$classMap;

        }, null, ClassLoader::class);
    }
}
