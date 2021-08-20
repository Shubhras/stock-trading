<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Trade;
use App\Models\Asset;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\DB;

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
        $user_id = $request->input('user_id');

        $asset_id = $request->input('asset_id');

        $user_current_wallet= DB::table('users')->select('users.wallet_balance')->where('id', $user_id)->first();

          $user_wallet_balance = $user_current_wallet->wallet_balance;

          $quenty = $request->input('volume');
          
          $totalPrice = $request->input('assetsPrice');

          $totalAssetPrice = $quenty  * $totalPrice;
          

         $totalAssetsPriceUser =  $user_wallet_balance - $totalAssetPrice;
         
         if($user_wallet_balance  >= $totalAssetPrice){

           


        $price = 2.5;

        $asset_idData = DB::table('assets')->select('assets.*')
            ->where('assets.id',$asset_id)
            ->first();
            $oldPrice = $asset_idData->price;

           $totalpricePer= $oldPrice * 2.5;
          $totalChange= $totalpricePer/100;

            $totalPrice = $oldPrice + $totalChange;

        $update_request_point = DB::table('assets')->where('id', $asset_id)->update(['price' => $totalPrice, 'change_pct' => $price ,'change_abs' => $totalChange]);

        // print_r($totalAssetsPriceUser);die;

       $user_wallet =  DB::table('users')->where('id', $user_id)->update(['wallet_balance' => $totalAssetsPriceUser]);

            $myWalletArray = array(
                'user_id' =>$request->input('user_id'),
                'asset_id' => $request->input('asset_id'),
                'status' => $request->input('transactiontype'),
                'quantity' => $request->input('volume'),
                'cost' => $request->input('assetsPrice'),
                'total_buy_cost' => $totalAssetPrice,
                // 'gain_loss' => $request->input('asset_id'),
                // 'total_sell_cost' => $request->input('asset_id'),
                'created_at' => now(),


            );
        //  }
        $wallet=  DB::table('wallets')->insert([
            'user_id' =>$request->input('user_id'),
                'asset_id' => $request->input('asset_id'),
                'status' => $request->input('transactiontype'),
                'quantity' => $request->input('volume'),
                'cost' => $request->input('assetsPrice'),
                'total_buy_cost' => $totalAssetPrice,
                // 'gain_loss' => $request->input('asset_id'),
                // 'total_sell_cost' => $request->input('asset_id'),
                'created_at' => now(),
        ]);        
             


        try {
            $point = new Trade;
            $point->user_id = $request->input('user_id');
            $point->asset_id = !empty($request->input('asset_id')) ? $request->input('asset_id'):'';
            $point->volume = $request->input('volume');
            $point->assettype = $request->input('assettype');
            $point->transactiontype = $request->input('transactiontype');
            $point->price_open = $request->input('assetsPrice');
            $point->price_close = ($request->input('volume'))*($request->input('assetsPrice'));
            $point->save();
            return response()->json(['user_id' =>  $request->input('user_id'), 
                                     'asset_id' => $request->input('asset_id'),
                                     'volume' =>  $request->input('volume'),
                                     'assettype' =>  $request->input('assettype'),
                                     'transactiontype' =>  $request->input('transactiontype'),
                                     'price_open' =>  $request->input('assetsPrice'),
                                     'price_close' =>  ($request->input('volume'))*($request->input('assetsPrice')),]);

        } catch (Exception $e) {
            echo $e;
            return response()->json(['e' => $e]);
        }
    }else{
            return response()->error('point not sufficent');
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
