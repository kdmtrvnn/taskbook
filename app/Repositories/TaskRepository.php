<?php

namespace App\Repositories;

use App\Http\Requests\Task\TaskStoreRequest;
use App\Models\Task;
use App\Models\User;
use App\Repositories\Interfaces\TaskRepositoryInterface;

class TaskRepository implements TaskRepositoryInterface
{
    public function getTasks(int $userId = 0, int $status = 0)
    {
        if ($userId === 0 && $status === 0) {
            return Task::query()->latest('created_at')->paginate(5);
        }

        if ($userId !== 0 && $status !== 0) {
            return Task::query()
                ->where('user_id', $userId)
                ->where('status', $status)
                ->latest('created_at')
                ->paginate(5);
        }

        $tasks = null;
        if ($userId !== 0 && $status === 0) {
            $tasks = Task::query()->where('user_id', $userId);
        }

        if ($status !== 0 && $userId === 0) {
            $tasks = Task::query()->where('status', $status);
        }

        return $tasks->latest('created_at')->paginate(5);
    }

    public function countAllTasks(): int
    {
        return Task::query()->count();
    }

    public function getTasksStatuses()
    {
        $statuses = Task::query()->distinct('status')->pluck('status');
        $arr = [];
        foreach ($statuses as $status) {
            $countTasks = Task::where('status', $status)->count();
            $arr[] = [
                'status_id' => array_search($status, Task::$statuses),
                'count_tasks' => $countTasks,
            ];
        }

        return $arr;
    }

    public function storeTask(TaskStoreRequest $request)
    {
        Task::create([
            'name' => $request->name,
            'user_id' => User::where('name', $request->author)->first()->id,
            'status' => $request->status,
        ]);
    }

    public function destroyTask(int $taskId)
    {
        Task::destroy($taskId);
    }
}
