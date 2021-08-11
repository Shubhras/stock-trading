<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\UpdateUser;
use App\Models\Sort\Backend\UserSort;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


use DB;
use Auth;

class UserRequestPointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, User $user)
    {
        $sort = new UserSort($request);

        $users = DB::table('users')->select('users.*','user_request_point.id as request_id','user_request_point.fund_request','user_request_point.release_fund','user_request_point.created_at','user_request_point.updated_at as last_request_point_update')
        ->join('user_request_point', 'user_request_point.user_id', '=', 'users.id')
        ->where('users.status','0')
        ->orderBy('user_request_point.id' ,'DESC')
        ->get();

        // print_r($users);die;

            // $users = User::orderBy($sort->getSortColumn(), $sort->getOrder())
            //     ->with('profiles')
            //     ->paginate($this->rowsPerPage);

      
        return view('pages.backend.users_request_point.index', [
            'users'     => $users,
            'sort'      => $sort->getSort(),
            'order'     => $sort->getOrder(),
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
//        return view('pages.backend.users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
 
    public function edit(User $user, $user_request)
    {
   

        $release_fund_user = DB::table('user_request_point')->select('user_request_point.*')
            ->where('user_request_point.id',$user_request)
            ->first();

            // print_r($release_fund_user);die;

        return view('pages.backend.users_request_point.edit', ['user' => $user,'release_fund_user' => $release_fund_user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        // validator passed, update fields

        // print_r($user);die;
        $id = $request->id;
        $name = $request->name;
        $email = $request->email;
        $fund_request = $request->fund_request;
        $release_fund = $request->release_fund;

        
        $release_fund_user = DB::table('user_request_point')->select('user_request_point.*')
            ->where('user_request_point.id',$id)
            ->first();

           $userId= $release_fund_user->user_id;

            $release_fund_user_wallet = DB::table('users')->select('users.*')
            ->where('users.id',$userId)
            ->first();

            $user_wallet_balance =$release_fund_user_wallet->wallet_balance;

           $total_wallet_bal=  $user_wallet_balance + $release_fund;

        // print_r($total_wallet_bal);die;
       

        $update_request_point = DB::table('user_request_point')->where('id', $id)->update(['release_fund' => $release_fund,'updated_at' => now()]);

        $update_wallet = DB::table('users')->where('id', $userId)->update(['wallet_balance' => $total_wallet_bal]);
    // }else{


    // }

        // $user->save();

        return redirect()->route('backend.users_request_point.index');


       
    }

    /**
     * Display a page to confirm deleting a user
     *
     * @param  \App\Models\User  $user
     */
    public function delete(Request $request, User $user) {
        // check that the user being deleted is not current
        if ($request->user()->id == $user->id) {
            return redirect()
                ->back()
                ->withErrors(['user' => __('users.error_delete_self')]);
        }

        $request->session()->flash('warning', __('users.delete_warning'));
        return view('pages.backend.users_request_point.delete', ['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request$request, User $user)
    {
        // check that the user being deleted is not current
        if ($request->user()->id == $user->id) {
            return redirect()
                ->back()
                ->withErrors(['user' => __('users.error_delete_self')]);
        }

        $userName = $user->name;

        // delete avatar
        if ($user->avatar)
            Storage::delete('avatars/' . $user->avatar);

        // delete user
        $user->delete();

        return redirect()
            ->route('backend.users_request_point.index')
            ->with('success', __('users.deleted', ['name' => $userName]));
    }

    /**
     * Generate users (bots)
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function generate(Request $request)
    {
        try {
            Artisan::call('generate:users', [
                'count' => $request->count
            ]);
        } catch (\Exception $e) {
            return back()->withInput()->withErrors($e->getMessage());
        }

        return redirect()
            ->route('backend.users_request_point.index')
            ->with('success', __('users.bots_generated', ['n' => $request->count]));
    }
}
