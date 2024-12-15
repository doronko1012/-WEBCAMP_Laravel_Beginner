<?php

declare(strict_types=1);
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginPostRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * トップページ を表示する
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * ログイン処理
     * 
     */
    public function login(AdminLoginPostRequest $request)
    {
        // // validate済

        // // データの取得
        $datum = $request->validated();
        var_dump($datum); exit;

        // //
        // // var_dump($datum); exit;

        // // 認証に失敗した場合
        // if (Auth::attempt($datum) === false) {
        //     return back()
        //             ->withInput() // 入力値の保持
        //             ->withErrors(['auth' => 'emailかパスワードに誤りがあります。']) //エラーメッセージの出力
        //             ;
        // }

        // // 認証に成功した場合
        // $request->session()->regenerate();
        // return redirect()->intended('/task/list');
    }
    
    /**
     * ログアウト処理
     * 
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerateToken(); // CSRFトークンの再生成
        $request->session()->regenerate(); // セッションIDの再生成
        return redirect(route('front.index'));
    }
}
