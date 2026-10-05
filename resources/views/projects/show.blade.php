@extends('layouts.app')

@section('title', 'Detail Project')

@section('content')

<h1>{{ $project->title }}</h1>

<p>{{ $project->description }}</p>

<a href="{{ route('projects.index') }}">Kembali</a>

<a href="{{ route('projects.edit', $project->id) }}">Edit</a>

<form action="{{ route('projects.destroy', $project->id) }}"
      method="POST"
      onsubmit="return confirm('Apakah kamu yakin ingin menghapus project ini?')">

    @csrf
    @method('DELETE')

    <button type="submit">Delete</button>
</form>

@endsection