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
            'product_id' => $variation->product_id,
            'sku' => $variation->sku,
            'images' => $variation->imagePaths(),
            'colors' => $variation->colors(),
        ];
    }
}
