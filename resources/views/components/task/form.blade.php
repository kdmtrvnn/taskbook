@props(['task' => null])

<x-form {{ $attributes }} >

    <x-form-item>
        <x-label required>
            {{ __('Название задачи') }}
        </x-label>

        <x-input name="name" autofocus />
        <x-error name="name"></x-error>
    </x-form-item>

    <x-form-item>
        <x-label required>
            {{ __('Имя автора') }}
        </x-label>

        <x-input name="author" />
        <x-error name="author"></x-error>
    </x-form-item>

    <select name="status" class="form-select mb-3" aria-label="Default select example">
        <option value="0" selected>Выбрать статус</option>
        @foreach(\App\Models\Task::$statuses as $status)
            <option>{{ $status }}</option>
        @endforeach
    </select>

    <x-error name="status"></x-error>

    <x-form-item>
        {{ $slot }}
    </x-form-item>

</x-form>
