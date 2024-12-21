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
     * 「単一のタスク」Modelの取得
     */
    protected function getTaskModel($task_id)
    {
        // task_idのレコードをt取得する
        $task = TaskModel::find($task_id);
        if ($task === null) {
            return null;
        }
        // 本人以外のタスクならNGとする
        if ($task->user_id !== Auth::id()) {
            return null;
        }

        return $task;
    }

    /**
     * 「単一のタスク」の表示
     */
    protected function singleTaskRender($task_id, $template_name)
    {
        // task_idのレコードを取得する
        $task = $this->getTaskModel($task_id);
        if ($task === null) {
            return redirect('/task/list');
        }

        // テンプレートに「取得したレコード」の情報を渡す
        return view($template_name, ['task' => $task]);
    }

        /**
     * 一覧用の Illuminate\Database\Eloquent\Builder インスタンスの取得
     */
    protected function getListBuilder()
    {
        return CompletedTaskModel::where('user_id', Auth::id())
                    ->orderBy('priority', 'DESC')
                    ->orderBy('period')
                    ->orderBy('created_at'); 
    }
}
