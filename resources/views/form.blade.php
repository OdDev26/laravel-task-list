@extends('layouts.app')
<blade
    section|(%26%2339%3Btitle%26%2339%3B%2C%20isset(%24task)%20%3F%20%26%2339%3BEdit%20Task%26%2339%3B%20%3A%20%26%2339%3BAdd%20Task%26%2339%3B)%0D />
@section('content')
<form
    action="{{ isset($task) ? route('tasks.update',['task' => $task->id]) : route('tasks.store') }}"
    method="post">
    @csrf
    @isset($task)
        @method('PUT')
    @endisset
    <div class="mb-4"><label for="title">
            Title
        </label>
        <input @class(['border-red-500' => $errors->has('title')]) value="{{ $task->title ?? old("title") }}" type="text" name="title"
            id="title">
    </div>
    @error('title')
        <p class='error'>{{ $message }}</p>
    @enderror
    <div class="mb-4"><label for="description">
            Description
        </label>
        <textarea @class(['border-red-500' => $errors->has('description')]) name="description" id="description"
            rows="5">{{ $task->description ?? old("description") }}</textarea>
        @error('description')
            <p class='error'>{{ $message }}</p>
        @enderror
    </div>
    <div  class="mb-4"><label for="long_description">
            Long_ Description
        </label>
        <textarea @class(['border-red-500' => $errors->has('long_description')]) name="long_description" id="long_description"
            rows="10">{{ $task->long_description ?? old("long_description") }}</textarea>
        @error('long_description')
            <p class='error'>{{ $message }}</p>
        @enderror
    </div>
    <div class="flex items-center gap-2"><button type="submit" class="btn">
            @isset($task)
                Update Task
            @else
                Add Task
            @endisset
        </button>
        <a class="link" href="{{route('tasks.index')}}">Cancel</a>
    </div>
</form>
@endsection
