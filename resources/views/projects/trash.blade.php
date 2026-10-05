@extends('layouts.app')

@section('title', 'Trash')

@section('content')

<h1>Trash</h1>

@if (session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('projects.index') }}" class="btn btn-secondary">
    Kembali ke Projects
</a>

@forelse ($projects as $project)

    <div class="project-card">

        <h2>{{ $project->title }}</h2>

        <p>{{ $project->description }}</p>

        <form action="{{ route('projects.restore', $project->id) }}"
            method="POST"
            style="display: inline;">

            @csrf
            @method('PUT')

            <button type="submit" class="btn btn-primary">
                Restore
            </button>

        </form>

        <form action="{{ route('projects.forceDelete', $project->id) }}"
            method="POST"
            style="display: inline;"
            onsubmit="return confirm('Yakin ingin menghapus permanen project ini?')">

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">
                Hapus Permanen
            </button>

        </form>

    </div>

@empty

    <p>Tidak ada project di Trash.</p>

@endforelse

@endsection