<?php

namespace Modules\Miles\;

use App\Providers\AuthServiceProvider;

class MilesAuthProvider extends AuthServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        \Modules\Miles\Models\Miles::class => \Modules\Miles\Policies\MilesPolicy::class,
    ];
}
