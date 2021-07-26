<?php

namespace App\Models\Sort\Frontend;

use Illuminate\Database\Eloquent\Model;

class UserRequestPoint extends Model
{
    //
    protected $table='user_request_point';
    protected $fillable = [

       'user_id', 'name','email','status', 'fund_request', 'release_fund'

    ];
}
