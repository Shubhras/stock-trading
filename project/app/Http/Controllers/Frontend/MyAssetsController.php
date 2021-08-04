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
        $assets = DB::table('trades')->select('trades.*','assets.symbol as name')
        ->join('assets', 'assets.id', '=', 'trades.asset_id')
        ->orderBy('id','DESC')->paginate(10);
       // ->get();
         // $users = DB::table('trades')->get();
          return view('pages.frontend.myassets.index',['assets'=>$assets]);
    }
}
