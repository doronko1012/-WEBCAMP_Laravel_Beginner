<?php

declare(strict_types=1); 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRegisterPostRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Task as TaskModel;
use Illuminate\Support\Facades\DB;
use App\Models\CompletedTask as CompletedTaskModel;
use Symfony\Component\HttpFoundation\StreamedRespomse;


class CompletedTaskController extends Controller
{
        /**
     * 完了タスクの一覧 を表示する
     * 
     * @return \Illuminate\View\View
     */
    public function list()
    {
        // 1Pageあたりの表示アイテム数を設定
        $per_page = 3;

        $list =  $this->getListBuilder()
                      ->paginate($per_page);
        return view('completed_list', ['list' => $list]);
    }

        /**
     * 一覧用の Illuminate\Database\Eloquent\Builder インスタンスの取得
     */
    protected function getListBuilder()
    {
        return TaskModel::where('user_id', Auth::id())
                    ->orderBy('priority', 'DESC')
                    ->orderBy('period')
                    ->orderBy('created_at'); 
    }
}
