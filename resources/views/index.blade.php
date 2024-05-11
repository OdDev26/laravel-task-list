@extends('layouts.app')
@section('title', 'The list of tasks')
@section('content')
<div>
    <nav class="mb-4"><a class="link"
            href="{{ route('tasks.create') }}">Add Task</a></nav>
</div>
@forelse($tasks as $task)
    <div><a href="{{ route('tasks.show', ['task' => $task->id]) }}"
            @class(['line-through' => $task->completed])>{{ $task->title }}</a>
    </div>
@empty
    There are no tasks
@endforelse
@if($tasks->count())
    <nav class="mt-4">
        {{ $tasks->links() }}
    </nav>
@endif
@endsection
