<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Product;

class ProductTransformer extends TransformerAbstract
{
    public function transform(Product $product)
    {
        return [
            'name' => $product->name,
            'available' => $product->available,
            'sku' => $product->sku,
            'upc' => $product->upc,
            'description' => $product->description,
            'features' => $product->features,
            'specifications' => $product->specifications,
            'price' => $product->price
        ];
    }
}
