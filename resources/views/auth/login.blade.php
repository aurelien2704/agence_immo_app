@extends('home.base')

@section('title', 'Connexion')

@section('content')
<div class="container mt-5">
    <h1>@yield('title')</h1>
    {{-- Formulaire de connexion --}}
    <form action="{{ route('login.authenticate') }}" method="post" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
@endsection