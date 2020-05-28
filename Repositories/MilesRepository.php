<?php

namespace Modules\Miles\Repositories;

use DB;
use Modules\Miles\Models\Miles;
use App\Ninja\Repositories\BaseRepository;
//use App\Events\MilesWasCreated;
//use App\Events\MilesWasUpdated;

class MilesRepository extends BaseRepository
{
    public function getClassName()
    {
        return 'Modules\Miles\Models\Miles';
    }

    public function all()
    {
        return Miles::scope()
                ->orderBy('created_at', 'desc')
                ->withTrashed();
    }

    public function find($filter = null, $userId = false)
    {
        $query = DB::table('miles')
                    ->where('miles.account_id', '=', \Auth::user()->account_id)
                    ->select(
                        'miles.trip_date', 'miles.vehicle', 'miles.purpose', 'miles.start_odometer', 'miles.end_odometer', 'miles.notes', 
                        'miles.public_id',
                        'miles.deleted_at',
                        'miles.created_at',
                        'miles.is_deleted',
                        'miles.user_id'
                    );

        $this->applyFilters($query, 'miles');

        if ($userId) {
            $query->where('clients.user_id', '=', $userId);
        }

        /*
        if ($filter) {
            $query->where();
        }
        */

        return $query;
    }

    public function save($data, $miles = null)
    {
        $entity = $miles ?: Miles::createNew();

        $entity->fill($data);
        $entity->save();

        /*
        if (!$publicId || intval($publicId) < 0) {
            event(new ClientWasCreated($client));
        } else {
            event(new ClientWasUpdated($client));
        }
        */

        return $entity;
    }

}
