@extends('layouts.app')

@section('content')
<div class="container">
    <h2>My Tasks</h2>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Create Task</a>

    <form method="GET" action="{{ route('tasks.index') }}" class="mb-4">
        <div class="row">
            <div class="col">
                <select name="status" class="form-control">
                    <option value="">Filter by Status</option>
                    <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Completed</option>
                    <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Not Completed</option>
                </select>
            </div>
            <div class="col">
                <select name="priority" class="form-control">
                    <option value="">Filter by Priority</option>
                    <option value="1" {{ request('priority') == '1' ? 'selected' : '' }}>High</option>
                    <option value="2" {{ request('priority') == '2' ? 'selected' : '' }}>Medium</option>
                    <option value="3" {{ request('priority') == '3' ? 'selected' : '' }}>Low</option>
                </select>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    @forelse($tasks as $task)
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $task->title }}</h5>
                <p>{{ $task->description }}</p>
                <p><strong>Priority:</strong>
                    {{ $task->priority == 1 ? 'High' : ($task->priority == 2 ? 'Medium' : 'Low') }}
                </p>
                <p><strong>Status:</strong>
                    {{ $task->status ? 'Completed' : 'Not Completed' }}
                </p>

                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">Edit</a>

                <form method="POST" action="{{ route('tasks.destroy', $task) }}" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    @empty
        <p>No tasks found.</p>
    @endforelse
</div>
@endsection
