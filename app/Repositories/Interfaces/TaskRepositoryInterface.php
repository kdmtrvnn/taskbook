<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\Task\TaskStoreRequest;

interface TaskRepositoryInterface
{
    public function getTasks(int $userId = 0, int $status = 0);
    public function countAllTasks(): int;
    public function getTasksStatuses();
    public function storeTask(TaskStoreRequest $request);
    public function destroyTask(int $taskId);
}
