<?php

namespace App\Presenters;

use App\Transformers\FinancialProposalTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class FinancialProposalPresenter.
 *
 * @package namespace App\Presenters;
 */
class FinancialProposalPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new FinancialProposalTransformer();
    }
}
