<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Trade;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class BuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('includes.pages.frontend.assets.index');
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
        // print_r($request->all());die;
        try {
            $point = new Trade;
            $point->user_id = $request->input('user_id');
            $point->asset_id = !empty($request->input('asset_id')) ? $request->input('asset_id'):'';
            $point->volume = $request->input('volume');
            $point->price_open = $request->input('assetsPrice');
            $point->price_close = ($request->input('volume'))*($request->input('assetsPrice'));
            $point->save();
            return response()->json(['user_id' =>  $request->input('user_id'), 
                                     'asset_id' => $request->input('asset_id'),
                                     'volume' =>  $request->input('volume'),
                                     'price_open' =>  $request->input('assetsPrice'),
                                     'price_close' =>  ($request->input('volume'))*($request->input('assetsPrice')),]);

        } catch (Exception $e) {
            echo $e;
            return response()->json(['e' => $e]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
