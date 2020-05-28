<?php

namespace Modules\Miles\Models;

use App\Models\EntityModel;
use Laracasts\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Miles extends EntityModel
{
    use PresentableTrait;
    use SoftDeletes;

    /**
     * @var string
     */
    protected $presenter = 'Modules\Miles\Presenters\MilesPresenter';

    /**
     * @var string
     */
    protected $fillable = ["trip_date","vehicle","purpose","start_odometer","end_odometer","notes"];

    /**
     * @var string
     */
    protected $table = 'miles';

    public function getEntityType()
    {
        return 'miles';
    }

}
