<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Trade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class WalletController extends Controller
{
    //
    public function index()
    {
        $assets = DB::table('wallets')->select('wallets.*','assets.symbol as name')
        ->join('assets', 'assets.id', '=', 'wallets.asset_id')
        ->where('user_id', auth()->user()->id)

        ->orderBy('id','DESC')->paginate(10);
       // ->get();
         // $users = DB::table('trades')->get();
        //  print_r($assets);die;
          return view('pages.frontend.wallet.index',['assets'=>$assets]);
    }

    public function update(Request $request)
    {
        // validator passed, update fields
        $assettype = $request->assettype;
        $transactiontype = $request->transactiontype;
        $trade_id = $request->asset_id;
        $volume = $request->volume;
        $id = $request->user_id;
        $name = $request->name;
        $email = $request->email;
        $fund_request = $request->fund_request;
        $release_fund = $request->wallet_balance;

        
        $release_fund_user = DB::table('users')->select('users.wallet_balance')
            ->where('users.id',$id)
            ->first();
           
        

            $user_wallet_balance = $release_fund_user->wallet_balance;

            // print_r($user_wallet_balance);die;

           $total_wallet_bal=  $user_wallet_balance + $release_fund;

       
       

        $update_request_point = DB::table('users')->where('id', $id)->update(['wallet_balance' => $total_wallet_bal,'updated_at' => now()]);


        $update_request_point = DB::table('trades')->where('id', $trade_id)->update(['transactiontype' => $transactiontype,'assettype' =>$assettype,'volume' =>$volume,'updated_at' => now()]);

       

        // $user->save();

        return redirect()->route('frontend.wallet.index');


       
    }
}
