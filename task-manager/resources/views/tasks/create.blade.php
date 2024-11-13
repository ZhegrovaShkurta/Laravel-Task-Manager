@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Task</h2>
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf

        <div class="mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="priority">Priority</label>
            <select name="priority" id="priority" class="form-control @error('priority') is-invalid @enderror">
                <option value="1" {{ old('priority') == 1 ? 'selected' : '' }}>High</option>
                <option value="2" {{ old('priority') == 2 ? 'selected' : '' }}>Medium</option>
                <option value="3" {{ old('priority') == 3 ? 'selected' : '' }}>Low</option>
            </select>
            @error('priority')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
