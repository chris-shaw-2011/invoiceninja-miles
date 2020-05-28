<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'Modules\\Miles\\Database\\Seeders\\MilesDatabaseSeeder' => $baseDir . '/Database/Seeders/MilesDatabaseSeeder.php',
    'Modules\\Miles\\Datatables\\MilesDatatable' => $baseDir . '/Datatables/MilesDatatable.php',
    'Modules\\Miles\\Http\\ApiControllers\\MilesApiController' => $baseDir . '/Http/ApiControllers/MilesApiController.php',
    'Modules\\Miles\\Http\\Controllers\\MilesController' => $baseDir . '/Http/Controllers/MilesController.php',
    'Modules\\Miles\\Http\\Requests\\CreateMilesRequest' => $baseDir . '/Http/Requests/CreateMilesRequest.php',
    'Modules\\Miles\\Http\\Requests\\MilesRequest' => $baseDir . '/Http/Requests/MilesRequest.php',
    'Modules\\Miles\\Http\\Requests\\UpdateMilesRequest' => $baseDir . '/Http/Requests/UpdateMilesRequest.php',
    'Modules\\Miles\\Models\\Miles' => $baseDir . '/Models/Miles.php',
    'Modules\\Miles\\Policies\\MilesPolicy' => $baseDir . '/Policies/MilesPolicy.php',
    'Modules\\Miles\\Presenters\\MilesPresenter' => $baseDir . '/Presenters/MilesPresenter.php',
    'Modules\\Miles\\Providers\\MilesServiceProvider' => $baseDir . '/Providers/MilesServiceProvider.php',
    'Modules\\Miles\\Repositories\\MilesRepository' => $baseDir . '/Repositories/MilesRepository.php',
    'Modules\\Miles\\Transformers\\MilesTransformer' => $baseDir . '/Transformers/MilesTransformer.php',
);
