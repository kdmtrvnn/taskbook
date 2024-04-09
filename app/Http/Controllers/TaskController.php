<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\TaskDestroyRequest;
use App\Http\Requests\Task\TaskStoreRequest;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class TaskController extends Controller
{
    public function __construct(
        private TaskRepositoryInterface $taskRepository,
        private UserRepositoryInterface $userRepository,
    ) {}

    public function index(Request $request, int $userId = 0, int $status = 0)
    {
        $tasks = $this->taskRepository->getTasks($userId, $status);
        $statuses = $this->taskRepository->getTasksStatuses();
        $count_all_tasks = $this->taskRepository->countAllTasks();

        $authors = $this->userRepository->getAuthors();

        if ($request->ajax()) {
            return View::make('task.ajax_tasks')->with(compact('tasks', 'statuses', 'count_all_tasks', 'authors'));
        } else {
            return view('task.index', compact('tasks', 'statuses', 'count_all_tasks', 'authors'));
        }
    }

    public function create()
    {
        return view('task.create');
    }

    public function store(TaskStoreRequest $request)
    {
        $this->taskRepository->storeTask($request);

        return redirect('/tasks');
    }

    public function destroy(TaskDestroyRequest $request, int $taskId)
    {
        $this->taskRepository->destroyTask($taskId);
    }
}
