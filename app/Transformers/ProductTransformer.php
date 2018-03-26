<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Product;

class ProductTransformer extends TransformerAbstract
{
    public function transform(Product $product)
    {
        return [
            'name' => $product->name
        ];
    }
}
