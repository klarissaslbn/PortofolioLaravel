@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div class="hero">
    <h1>Welcome to My Portfolio</h1>

    <p>
        Halo! Saya adalah mahasiswa yang sedang belajar
        pengembangan aplikasi dan web menggunakan Laravel.
    </p>

    <a href="{{ route('projects.index') }}" class="btn btn-primary">
        Lihat Project
    </a>
</div>

@endsection