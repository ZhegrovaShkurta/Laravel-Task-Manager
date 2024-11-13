@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Task</h2>
    <form method="POST" action="{{ route('tasks.update', $task) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required>{{ $task->description }}</textarea>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <input type="checkbox" name="status" {{ $task->status ? 'checked' : '' }}>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
