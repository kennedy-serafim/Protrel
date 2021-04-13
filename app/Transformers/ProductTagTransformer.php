<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\ProductTag;

/**
 * Class ProductTagTransformer.
 *
 * @package namespace App\Transformers;
 */
class ProductTagTransformer extends TransformerAbstract
{
    /**
     * Transform the ProductTag entity.
     *
     * @param \App\Models\ProductTag $model
     *
     * @return array
     */
    public function transform(ProductTag $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
