<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPost;
use Auth;

class MyController extends CommonController
{
    //
    public function passwordForm()
    {
        return view('admin.my.passwordForm');
    }
    
    public function changePassword(AdminPost $request)
    {
        $model = Auth::guard('admin')->user();
        $model->password = bcrypt($request['password']);
        $model->save();
        /*用于弹出模态框的组件
           1.composer require laracasts/flash
           2.app.php配置 'providers' => [
            Laracasts\Flash\FlashServiceProvider::class
            ],
           3.php artisan vendor:publish --provider="Laracasts\Flash\FlashServiceProvider"
           4.页面文件@include('flash::message')
           5.控制器文件 flash('密码修改成功')->overlay();
         * */
        flash('密码修改成功')->overlay();
        return redirect()->back();
    }
}
