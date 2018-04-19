<?php

namespace App\Http\Controllers\Panel;

use App\Variation;
use App\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VariationsController extends Controller
{
    public function store(Request $request)
    {
        $colors = $request->variation_colors;
        $images = $request->_variation_images;

        $variation = Variation::create([
            'sku' => $request->sku
        ]);

        foreach ($colors as $color) {
            $variation->tag($color);
        }

        if ($request->_variation_images) {
            foreach ($images as $id) {
                $image = ProductImage::find($id);

                $image->imageable_id = $variation->id;
                $image->imageable_type = 'App\Variation';

                $image->save();
            }
        }

        return response([
            'data' => [
                'id' => $variation->id,
                'sku' => $variation->sku,
                'images' => $request->_variation_images,
            ]
        ], 200);
    }

    public function update(Request $request)
    {
        $colors = $request->variation_colors;
        $images = $request->_variation_images;

        $variation = Variation::where('sku', $request->sku)->first();

        $variation->untag();

        foreach ($colors as $color) {
            $variation->tag($color);
        }

        if ($request->_variation_images) {
            foreach ($images as $id) {
                $image = ProductImage::find($id);

                $image->imageable_id = $variation->id;
                $image->imageable_type = 'App\Variation';

                $image->save();
            }
        }

        return response([
            'data' => [
                'id' => $variation->id,
                'sku' => $variation->sku,
                'images' => $request->_variation_images,
            ]
        ], 200);
    }
}
