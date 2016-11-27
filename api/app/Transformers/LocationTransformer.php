<?php

namespace Watergo\Transformers;

use League\Fractal\TransformerAbstract;
use Watergo\Entities\Location;

/**
 * Class LocationTransformer
 * @package namespace Watergo\Transformers;
 */
class LocationTransformer extends TransformerAbstract
{

    /**
     * Transform the \Location entity
     * @param \Location $model
     *
     * @return array
     */
    public function transform(Location $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
