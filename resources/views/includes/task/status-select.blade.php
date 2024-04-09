<select id="statuses-filter" class="form-select" onchange="filterTasks()" aria-label="Default select example">
    <option value="0" selected>Все статусы ({{ $count_all_tasks }})</option>
    @foreach($statuses as $status)
        <option value="{{ $status['status_id'] }}">{{ \App\Models\Task::$statuses[$status['status_id']] }} ({{ $status['count_tasks'] }})</option>
    @endforeach
</select>
