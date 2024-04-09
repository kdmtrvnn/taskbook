<a {{ $attributes }} >
    <x-button href="{{ route('tasks.create') }}" class="btn-sm">
        {{ $slot }}
    </x-button>
</a>
