<?php

namespace App\Http\Controllers\Panel;

use App\Ad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Ad::where('name', 'banner')->first();
        $cta_one = Ad::where('name', 'cta_one')->first();
        $cta_two = Ad::where('name', 'cta_two')->first();
        $cta_three = Ad::where('name', 'cta_three')->first();

        return view('panel.ads.index', compact('banner', 'cta_one', 'cta_two', 'cta_three'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $banner = Ad::where('name', 'banner')->first();
        $cta_one = Ad::where('name', 'cta_one')->first();
        $cta_two = Ad::where('name', 'cta_two')->first();
        $cta_three = Ad::where('name', 'cta_three')->first();

        if ($request->banner) {
            $banner->link = $request->banner_link;
            $banner->image_id = $request->banner;
            $banner->save();
        }

        if ($request->cta_one) {
            $cta_one->link = $request->cta_one;
            $cta_one->image_id = $request->cta_one;
            $cta_one->save();
        }

        if ($request->cta_two) {
            $cta_two->link = $request->cta_two;
            $cta_two->image_id = $request->cta_two;
            $cta_two->save();
        }

        if ($request->cta_three) {
            $cta_three->link = $request->cta_three;
            $cta_three->image_id = $request->cta_three;
            $cta_three->save();
        }

        $request->session()->flash('alert:sucess', 'Ads were updated!');

        return redirect()->route('panel.ads.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        //
    }
}
