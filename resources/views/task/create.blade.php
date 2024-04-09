@extends('layouts.main')

@section('page.title', 'Создать задачу')

@section('main.content')

    <x-title>

        {{ __('Добавление новой задачи') }}

        <x-slot name="link">
            <a href="{{ route('tasks.index') }}">
                {{ __('Назад') }}
            </a>
        </x-slot>

    </x-title>


    <x-task.form action="{{ route('tasks.store') }}" method="POST">

        <x-button type="submit">
            {{ __('Создать задачу') }}
        </x-button>

    </x-task.form>

@endsection
