<?php

namespace App\Presenters;

use App\Transformers\WarrantyTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class WarrantyPresenter.
 *
 * @package namespace App\Presenters;
 */
class WarrantyPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new WarrantyTransformer();
    }
}
