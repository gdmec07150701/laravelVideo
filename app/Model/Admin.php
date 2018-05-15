<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
/*
 * 引入laravel自带的用户验证类
 * */
use Illuminate\Foundation\Auth\User;
class Admin extends User
{
    //
    protected $rememberTokenName = '';
}
