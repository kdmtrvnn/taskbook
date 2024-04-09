@if($tasks->isEmpty())
    <div class="row pb-3">
        <div class="col-6">
            @include('includes.task.author-select')
        </div>

        <div class="col-6">
            @include('includes.task.status-select')
        </div>
    </div>

    {{ __('Нет ни одной задачи') }}
@else
    <div class="row pb-3">
        <div class="col-6">
            @include('includes.task.author-select')
        </div>

        <div class="col-6">
            @include('includes.task.status-select')
        </div>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Название задачи</th>
            <th scope="col">Автор</th>
            <th scope="col">Статус</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr id="{{ $task->id }}">
                <th scope="row">
                    <button
                        type="button"
                        onclick="destroyTask('{{ $task->id }}')"
                        class="btn-close small"
                        aria-label="Close"
                    ></button>
                </th>
                <td>{{ $task->name }}</td>
                <td>{{ $task->user->name }}</td>
                <td>{{ $task->status }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $tasks->links() }}

@endif
