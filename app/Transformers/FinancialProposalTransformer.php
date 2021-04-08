<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\FinancialProposal;

/**
 * Class FinancialProposalTransformer.
 *
 * @package namespace App\Transformers;
 */
class FinancialProposalTransformer extends TransformerAbstract
{
    /**
     * Transform the FinancialProposal entity.
     *
     * @param \App\Models\FinancialProposal $model
     *
     * @return array
     */
    public function transform(FinancialProposal $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
