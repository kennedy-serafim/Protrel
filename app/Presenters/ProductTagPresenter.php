<?php

namespace App\Presenters;

use App\Transformers\ProductTagTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProductTagPresenter.
 *
 * @package namespace App\Presenters;
 */
class ProductTagPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProductTagTransformer();
    }
}
