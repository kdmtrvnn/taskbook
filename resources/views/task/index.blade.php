@extends('layouts.main')

@section('page.title', 'Задачи')

@section('main.content')

    <script>
        function filterTasks() {
            let userId = $('#authors-filter').val();
            let status = $('#statuses-filter').val();

            $.ajax({
                url: '/tasks/' + userId + '/' + status,
                type: 'GET',
            }).done(function (data) {
                if (data) {
                    $('#tasks').html(data);
                    $('#authors-filter').val(userId);
                    $('#statuses-filter').val(status);
                }
            });
        }

        function destroyTask(taskId) {
            if (confirm('Вы уверены что хотите удалить эту задачу?')) {
                $.ajax({
                    url: '/tasks/' + taskId,
                    type: 'DELETE',
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'task_id': taskId,
                    },
                }).done(function () {
                    $('#' + taskId).hide();
                });
            }
        }

        $(document).ready(function() {
            let url = $(location). attr('href');
            let existsSubstring = url.indexOf('page');
            if (existsSubstring > 0) {
                let sliceUrl1 = url.split('tasks/')[1];
                let sliceUrl2 = sliceUrl1.split('page')[0];
                let selectValue = sliceUrl2.match(/\d/g);
                $('#authors-filter').val(selectValue[0]);
                $('#statuses-filter').val(selectValue[1]);
            }
        });
    </script>

    <x-title>

        {{ __('Задачник') }}

        <x-slot name="right">
            <x-button-link href="{{ route('tasks.create') }}">
                {{ __('Новая задача') }}
            </x-button-link>
        </x-slot>

    </x-title>

    <div id="tasks">
        @if($tasks->isEmpty())
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
    </div>

@endsection
