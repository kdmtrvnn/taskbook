<?php

namespace App\Repositories;

use App\Models\Task;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function getAuthors()
    {
        $userIds = Task::query()->distinct('user_id')->pluck('user_id');

        return User::select(['id', 'name'])->whereIn('id', $userIds)->withCount('tasks')->get();
    }
}
