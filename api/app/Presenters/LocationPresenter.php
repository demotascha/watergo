<?php

namespace Watergo\Presenters;

use Watergo\Transformers\LocationTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class LocationPresenter
 *
 * @package namespace Watergo\Presenters;
 */
class LocationPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new LocationTransformer();
    }
}
