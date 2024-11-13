@extends('layouts.app')

@section('content')
<div class="container">
    <h2>My Tasks</h2>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Create Task</a>
    @foreach($tasks as $task)
        <div class="card mb-2">
            <div class="card-body">
                <h5>{{ $task->title }}</h5>
                <p>{{ $task->description }}</p>
                <form method="POST" action="{{ route('tasks.destroy', $task) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
