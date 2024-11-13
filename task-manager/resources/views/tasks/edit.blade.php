@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Task</h2>
    <form method="POST" action="{{ route('tasks.update', $task) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $task->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" required>{{ old('description', $task->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="priority">Priority</label>
            <select id="priority" name="priority" class="form-control">
                <option value="1" {{ $task->priority == 1 ? 'selected' : '' }}>High</option>
                <option value="2" {{ $task->priority == 2 ? 'selected' : '' }}>Medium</option>
                <option value="3" {{ $task->priority == 3 ? 'selected' : '' }}>Low</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="status">Status</label>
            <input type="checkbox" id="status" name="status" {{ $task->status ? 'checked' : '' }}>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
