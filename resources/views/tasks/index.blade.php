@extends('layouts.app')

@section('content')
<div class="row mb-3">
    <div class="col-md-6">
        <h1>Task List</h1>
    </div>
    <div class="col-md-6 text-end">
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> + Add New Task
        </a>
    </div>
</div>

{{-- Filter dan Search --}}
<div class="card mb-4">
    <div class="card-body">
        <form action="{{ route('tasks.index') }}" method="GET" class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="status" class="col-form-label">Filter Status:</label>
            </div>
            <div class="col-md-3">
                <select name="status" id="status" class="form-select">
                    <option value="">All</option>
                    <option value="pending" @if(request('status') == 'pending') selected @endif>Pending</option>
                    <option value="in-progress" @if(request('status') == 'in-progress') selected @endif>In Progress</option>
                    <option value="completed" @if(request('status') == 'completed') selected @endif>Completed</option>
                </select>
            </div>
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Search Task Title..." value="{{ request('search') }}">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-info">Apply Filter</button>
            </div>
            <div class="col-auto">
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Reset</a>
            </div>
        </form>
    </div>
</div>

{{-- Tabel Task --}}
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>
                        <span class="badge @switch($task->status)
                            @case('pending') bg-danger @break
                            @case('in-progress') bg-warning text-dark @break
                            @case('completed') bg-success @break
                        @endswitch">
                            {{ ucfirst(str_replace('-', ' ', $task->status)) }}
                        </span>
                    </td>
                    <td>{{ $task->due_date ? $task->due_date->format('Y-m-d') : 'N/A' }}</td>
                    <td>
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-info me-2">Edit</a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus tugas ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada tugas yang ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Pagination --}}
<div class="d-flex justify-content-center">
    {{ $tasks->links() }}
</div>
@endsection