@extends('layouts.app')

@section('title', 'Tambah Project')

@section('content')

<h1>Tambah Project</h1>

<div class="form-card">

    <form action="{{ route('projects.store') }}" method="POST">

        @csrf

        <div class="form-group">
            <label>Judul Project</label>

            <input
                type="text"
                name="title"
                value="{{ old('title') }}"
                minlength="5"
                required
            >

            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label>Deskripsi</label>

            <textarea
                name="description"
                minlength="10"
                required
            >{{ old('description') }}</textarea>

            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Simpan Project
        </button>

        <a href="{{ route('projects.index') }}" class="btn btn-secondary">
            Batal
        </a>

    </form>

</div>

@endsection