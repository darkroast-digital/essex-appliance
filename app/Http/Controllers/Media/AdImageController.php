<?php

namespace App\Http\Controllers\Media;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use App\Http\Requests\StoreAvatarFormRequest;
use App\Image;

class AdImageController extends Controller
{
    protected $imageManager;

    public function __construct(ImageManager $imageManager)
    {
        $this->imageManager = $imageManager;
    }

    public function store(StoreAvatarFormRequest $request)
    {
        $processedImage = $this->imageManager->make($request->file('image')->getPathName())
        ->encode('jpg')
        ->save(config('image.path.absolute') . $path = '/ads/' . uniqid(true) . '.jpg');

        $image = new Image;
        $image->path = $path;

        $image->save();

        return response([
            'data' => [
                'id' => $image->id,
                'path' => $image->path(),
            ]
        ], 200);
    }
}
