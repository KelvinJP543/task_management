@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col">
        <h1>Dashboard</h1>
    </div>
</div>

{{-- Cards Statistik --}}
<div class="row mb-5">
    {{-- Card Total Tasks --}}
    <div class="col-md-3 mb-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5 class="card-title">Total Tasks</h5>
                <p class="card-text fs-3">{{ $stats['total'] ?? 0 }}</p>
            </div>
        </div>
    </div>

    {{-- Card Pending --}}
    <div class="col-md-3 mb-3">
        <div class="card text-white bg-danger">
            <div class="card-body">
                <h5 class="card-title">Pending</h5>
                <p class="card-text fs-3">{{ $stats['pending'] ?? 0 }}</p>
            </div>
        </div>
    </div>

    {{-- Card In Progress --}}
    <div class="col-md-3 mb-3">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <h5 class="card-title">In Progress</h5>
                <p class="card-text fs-3">{{ $stats['in_progress'] ?? 0 }}</p>
            </div>
        </div>
    </div>

    {{-- Card Completed --}}
    <div class="col-md-3 mb-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5 class="card-title">Completed</h5>
                <p class="card-text fs-3">{{ $stats['completed'] ?? 0 }}</p>
            </div>
        </div>
    </div>
</div>

{{-- Recent Tasks (Placeholder) --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Recent Tasks
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item text-muted">Akan ditampilkan tugas-tugas terbaru di sini.</li>
            </ul>
        </div>
    </div>
</div>
@endsection