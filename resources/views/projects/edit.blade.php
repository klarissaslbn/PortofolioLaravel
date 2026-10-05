@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')

<h1>Edit Project</h1>

<form action="{{ route('projects.update', $project->id) }}" method="POST">

    @csrf
    @method('PUT')

    <div>
        <label>Judul Project</label>
        <input
            type="text"
            name="title"
            value="{{ old('title', $project->title) }}"
            minlength="5"
            required
        >

        @error('title')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>Deskripsi</label>
        <textarea
            name="description"
            minlength="10"
            required
        >{{ old('description', $project->description) }}</textarea>

        @error('description')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit">Simpan Perubahan</button>

</form>

<a href="{{ route('projects.index') }}">Kembali</a>

@endsection