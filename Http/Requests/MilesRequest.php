<?php

namespace Modules\Miles\Http\Requests;

use App\Http\Requests\EntityRequest;

class MilesRequest extends EntityRequest
{
    protected $entityType = 'miles';
}
