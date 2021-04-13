<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Contest;

/**
 * Class ContestTransformer.
 *
 * @package namespace App\Transformers;
 */
class ContestTransformer extends TransformerAbstract
{
    /**
     * Transform the Contest entity.
     *
     * @param \App\Models\Contest $model
     *
     * @return array
     */
    public function transform(Contest $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
