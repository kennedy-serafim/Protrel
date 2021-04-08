<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Warranty;

/**
 * Class WarrantyTransformer.
 *
 * @package namespace App\Transformers;
 */
class WarrantyTransformer extends TransformerAbstract
{
    /**
     * Transform the Warranty entity.
     *
     * @param \App\Models\Warranty $model
     *
     * @return array
     */
    public function transform(Warranty $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
