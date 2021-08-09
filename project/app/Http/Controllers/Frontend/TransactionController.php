<?php

namespace App\Http\Controllers\Frontend;
//use DB;
use App\Models\Trade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      $assets = DB::table('trades')->select('trades.*','assets.name')
      ->join('assets', 'assets.id', '=', 'trades.asset_id')
      ->orderBy('id','DESC')->paginate(10);
     // ->get();
       // $users = DB::table('trades')->get();
        return view('pages.frontend.transactions.index',['assets'=>$assets]);
        }

   
    public function store(Request $request)
    {
        //
    }

    

   
}
