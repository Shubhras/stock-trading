<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MyAssetsController extends Controller
{
    //
    public function index()
    {
        // $assets = DB::table('trades')->select('trades.*','assets.symbol as name','assets.price as current_value')
        // ->join('assets', 'assets.id', '=', 'trades.asset_id')
        // ->orderBy('id','DESC')->paginate(10);

        $assets = DB::table('wallets')->select('wallets.*', 'assets.symbol as name', 'assets.price as current_value', 'assets.id as assets_id')
            ->join('assets', 'assets.id', '=', 'wallets.asset_id')->where(['wallets.status'=> 'paid','user_id'=> auth()->user()->id])
            ->orderBy('id', 'DESC')->paginate(10);


        // ->get();
        // $users = DB::table('trades')->get();
        return view('pages.frontend.myassets.index', ['assets' => $assets]);
    }
    public function update(Request $request)
    {
        // validator passed, update fields
        $assettype = $request->assettype;
        $transactiontype = $request->transactiontype;
        $trade_id = $request->asset_id;
        $wallet_id = $request->asset_id;
        $assets_id_admin = $request->assets_id_admin;
        $sellVolume = $request->volume;
        $id = $request->user_id;
        $name = $request->name;
        $email = $request->email;
        $fund_request = $request->fund_request;
        $release_fund = $request->wallet_balance;
       $assetsCurrentPrices = $request->assetsCurrentPrice;
       $assetstype = $request->assetstype;
        //print_r($release_fund);

        $release_fund_user = DB::table('users')->select('users.wallet_balance')
            ->where('users.id', $id)
            ->first();



        $user_wallet_balance = $release_fund_user->wallet_balance;

        // print_r($user_wallet_balance);die;

        $total_wallet_bal =  $user_wallet_balance + $release_fund;


        //user point available wallet balance 

        $update_request_point = DB::table('users')->where('id', $id)->update(['wallet_balance' => $total_wallet_bal, 'updated_at' => now()]);

        //transaction update in sell and buy 

        // $update_request_point = DB::table('trades')->where('id', $trade_id)->update(['transactiontype' => $transactiontype, 'assettype' => $assettype, 'volume' => $sellVolume, 'updated_at' => now()]);


       

        //wallet update by sell 
        $walletGain = DB::table('wallets')->select('wallets.total_buy_cost','wallets.cost','wallets.quantity','assets.price') ->join('assets', 'assets.id', '=', 'wallets.asset_id')->where('wallets.id', $wallet_id)->first();

        $total_buy_cost = $walletGain->total_buy_cost;
        $cost = $walletGain->cost;
        $price = $walletGain->price;

        // $totalGain = $release_fund - $total_buy_cost;
        // $gain = $totalGain / 100;
       $priviusGainValues = $cost * $sellVolume;
       $currentGainValues = $price * $sellVolume;

       $gain = (($currentGainValues - $priviusGainValues) / $priviusGainValues) * 100;


        //  print_r($totalGain);die;
        $priviusQualtity = $walletGain->quantity - $sellVolume;
        

        $update_request_point = DB::table('wallets')->where('id', $wallet_id)->update(['quantity' => $priviusQualtity]);

        // print_r($transactiontype);die;

       


        //assets update cost 

        $assetsCost = DB::table('assets')->select('assets.id','assets.price','assets.name','assets.volume')->where('id', $assets_id_admin)->first();
        $currentPrices = $assetsCost->price;
        $assetsPointLow = 2.5;

        $availableAssetsCost =  $assetsCost->price * $assetsPointLow / 100;
        $totalAssetsCost = $assetsCost->price - $availableAssetsCost;


        $wallet =  DB::table('wallets')->insert([
            'user_id' => $id, 'asset_id' => $assets_id_admin, 'status' => $transactiontype, 'quantity' => $sellVolume, 'cost' =>$assetsCurrentPrices, 'total_buy_cost' => $total_buy_cost, 'gain_loss' => $gain, 'total_sell_cost' => $release_fund, 'created_at' => now(), 'updated_at' => now(),
        ]);

        $update_request_point = DB::table('assets')->where('id', $assets_id_admin)->update(['price' => $totalAssetsCost]);

       

        $wallet =  DB::table('trades')->insert([
            'user_id' => $id, 'asset_id' => $assets_id_admin, 'transactiontype' => $transactiontype, 'volume' => $sellVolume, 'price_open' =>$assetsCurrentPrices, 'assettype' =>$assetstype, 'price_close' => $release_fund, 'created_at' => now(), 'updated_at' => now(),
        ]);
        

        // $user->save();

        return redirect()->route('frontend.myassets.index');
    }
}
