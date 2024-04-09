<select id="authors-filter" class="form-select" onchange="filterTasks()" aria-label="Default select example">
    <option value="0" selected>Все авторы ({{ $count_all_tasks }})</option>
    @foreach($authors as $author)
        <option value="{{ $author->id }}">{{ $author->name }} ({{ $author->tasks_count }})</option>
    @endforeach
</select>
