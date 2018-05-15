<?php

namespace App\Http\Controllers\Admin;

/*
 * http请求
 * */
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class EntryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth')->except(['login','loginForm']);
        
    }
    public function index()
    {
        return view('admin.entry.index');
    }
    
    public function loginForm()
    {
        return view('admin.entry.login');
    }
    
    public function login(Request $request)
    {
        
        $status = Auth::guard('admin')->attempt([
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ]);
        if($status){
            return redirect('/admin/index');
        }
        return redirect('/admin/login')->with('error','账号密码错误');
    }
    
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
    
}
