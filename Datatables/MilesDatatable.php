<?php

namespace Modules\Miles\Datatables;

use Utils;
use URL;
use Auth;
use App\Ninja\Datatables\EntityDatatable;

class MilesDatatable extends EntityDatatable
{
    public $entityType = 'miles';
    public $sortCol = 1;

    public function columns()
    {
        return [
            [
                'trip_date',
                function ($model) {
                    return $model->trip_date;
                }
            ],[
                'vehicle',
                function ($model) {
                    return $model->vehicle;
                }
            ],[
                'purpose',
                function ($model) {
                    return $model->purpose;
                }
            ],[
                'start_odometer',
                function ($model) {
                    return $model->start_odometer;
                }
            ],[
                'end_odometer',
                function ($model) {
                    return $model->end_odometer;
                }
            ],[
                'notes',
                function ($model) {
                    return $model->notes;
                }
            ],
            [
                'created_at',
                function ($model) {
                    return Utils::fromSqlDateTime($model->created_at);
                }
            ],
        ];
    }

    public function actions()
    {
        return [
            [
                mtrans('miles', 'edit_miles'),
                function ($model) {
                    return URL::to("miles/{$model->public_id}/edit");
                },
                function ($model) {
                    return Auth::user()->can('editByOwner', ['miles', $model->user_id]);
                }
            ],
        ];
    }

}
