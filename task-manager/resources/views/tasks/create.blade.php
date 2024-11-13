@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Task</h2>
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
    <label>Priority</label>
    <select name="priority" class="form-control">
        <option value="1">High</option>
        <option value="2">Medium</option>
        <option value="3" selected>Low</option>
    </select>
</div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
