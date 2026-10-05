@extends('layouts.app')

@section('title', 'Projects')

@section('content')

<h1>Daftar Project</h1>

@if (session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('projects.create') }}" class="btn btn-primary">
    + Tambah Project
</a>

@foreach ($projects as $project)

    <div class="project-card">

        <h2>{{ $project->title }}</h2>

        <p>{{ $project->description }}</p>

        <a href="{{ route('projects.show', $project->id) }}"
           class="btn btn-primary">
            Lihat Detail
        </a>

        <a href="{{ route('projects.edit', $project->id) }}"
           class="btn btn-warning">
            Edit
        </a>

        <form action="{{ route('projects.destroy', $project->id) }}"
              method="POST"
              style="display: inline;"
              onsubmit="return confirm('Yakin ingin menghapus project ini?')">

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">
                Hapus
            </button>

        </form>

    </div>

@endforeach

@endsection