<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <title>@yield('title') | Administration</title>
</head>
<body>
  {{-- Barre de navigation --}}
  <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Agence</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    {{-- Récupère la route actuelle --}}
    @php
    $route=request()->route()->getName();  
    @endphp

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          {{-- Si le lien actif commence par 'admin.properties.' alors on lui attribue la classe 'active' --}}
          <a @class(['nav-link', 'active' => str_contains($route, 'admin.properties.')]) href="{{ route('admin.properties.index') }}">Gérer les biens</a>
        </li>
        <li class="nav-item">
          {{-- Si le lien actif commence par 'admin.options.' alors on lui attribue la classe 'active' --}}
          <a @class(['nav-link', 'active' => str_contains($route, 'admin.options.')]) href="{{ route('admin.options.index') }}">Gérer les options</a>
        </li>
      </ul>
      {{-- Formulaire de déconnexion --}}
      <div class="ms-auto">
        @auth
        <ul class="navbar-nav">
          <li class="nav-item">
            <form action="{{route('logout')}}" method="post" class="d-flex">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-primary">Se déconnecter</button>
            </form>
          </li>
        </ul>
        @endauth
      </div>
    </div>
  </div>
</nav>

  <div class="container mt-5">

    {{-- Affiche un message de succès si la session contient une clé 'success' --}}
    @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif

    @yield('content')

  </div>
</body>
</html>