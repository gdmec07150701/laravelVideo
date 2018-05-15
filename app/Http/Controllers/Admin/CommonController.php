<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin.auth');
    }
    
    public function success($message)
    {
        return response()->json(['message'=>$message, 'valid'=>'1']);
    }
    
    public function error($message)
    {
        return response()->json(['message'=>$message, 'valid'=>'0']);
    }
}
