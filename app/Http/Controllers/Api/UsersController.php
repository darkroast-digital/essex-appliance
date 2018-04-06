<?php

namespace App\Http\Controllers\Api;

use App\User;
use Spatie\Fractal\Fractal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\UserTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = User::paginate(10);
        $users = $paginator->getCollection();

        $data = Fractal::create()
                ->collection($users, new UserTransformer())
                ->paginateWith(new IlluminatePaginatorAdapter($paginator))
                ->toArray();

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if ($user) {
            $data = Fractal::create()
                ->item($user, new UserTransformer())
                ->toArray();

            return response()->json($data);
        }

        return response('User not found', 404);
    }
}
