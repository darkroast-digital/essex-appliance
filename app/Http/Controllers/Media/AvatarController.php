<?php

namespace App\Http\Controllers\Media;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use App\Http\Requests\StoreAvatarFormRequest;
use App\Image;

class AvatarController extends Controller
{
    protected $imageManager;

    public function __construct(ImageManager $imageManager)
    {
        $this->imageManager = $imageManager;
    }

    public function store(StoreAvatarFormRequest $request)
    {
        $processedImage = $this->imageManager->make($request->file('image')->getPathName())->fit(192, 192, function ($c) {
            $c->aspectRatio();
        })
        ->encode('png')
        ->save(config('image.path.absolute') . $path = '/avatars/' . uniqid(true) . '.png');

        // if uploading to S3 remove the save method and upload processed image

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
