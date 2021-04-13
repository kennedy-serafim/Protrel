<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Supplier;

/**
 * Class SupplierTransformer.
 *
 * @package namespace App\Transformers;
 */
class SupplierTransformer extends TransformerAbstract
{
    /**
     * Transform the Supplier entity.
     *
     * @param \App\Models\Supplier $model
     *
     * @return array
     */
    public function transform(Supplier $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
