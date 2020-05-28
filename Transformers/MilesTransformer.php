<?php

namespace Modules\Miles\Transformers;

use Modules\Miles\Models\Miles;
use App\Ninja\Transformers\EntityTransformer;

/**
 * @SWG\Definition(definition="Miles", @SWG\Xml(name="Miles"))
 */

class MilesTransformer extends EntityTransformer
{
    /**
    * @SWG\Property(property="id", type="integer", example=1, readOnly=true)
    * @SWG\Property(property="user_id", type="integer", example=1)
    * @SWG\Property(property="account_key", type="string", example="123456")
    * @SWG\Property(property="updated_at", type="integer", example=1451160233, readOnly=true)
    * @SWG\Property(property="archived_at", type="integer", example=1451160233, readOnly=true)
    */

    /**
     * @param Miles $miles
     * @return array
     */
    public function transform(Miles $miles)
    {
        return array_merge($this->getDefaults($miles), [
            'trip_date' => $miles->trip_date,
            'vehicle' => $miles->vehicle,
            'purpose' => $miles->purpose,
            'start_odometer' => $miles->start_odometer,
            'end_odometer' => $miles->end_odometer,
            'notes' => $miles->notes,
            'id' => (int) $miles->public_id,
            'updated_at' => $this->getTimestamp($miles->updated_at),
            'archived_at' => $this->getTimestamp($miles->deleted_at),
        ]);
    }
}
