<?php

namespace App\Presenters;

use App\Transformers\ContestTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ContestPresenter.
 *
 * @package namespace App\Presenters;
 */
class ContestPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ContestTransformer();
    }
}
