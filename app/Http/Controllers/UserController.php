<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRegisterPostRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Task as TaskModel;
use App\Models\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use App\Models\CompletedTask as CompletedTaskModel;
use Symfony\Component\HttpFoundation\StreamedRespomse;

class UserController extends Controller
{
        /**
     * 登録画面 を表示する
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('/user/register');
    }

    /**
     * データベース処理
     * 
     * @return \Illuminate\View\View
     */
    public function register()
    {
        return view('welcome_second');
    }   
}
