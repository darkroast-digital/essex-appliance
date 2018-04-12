<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Variation;

class VariationTransformer extends TransformerAbstract
{
    public function transform(Variation $variation)
    {
        return [
            'id' => $variation->id,
            'sku' => $variation->sku,
        ];
    }
}
