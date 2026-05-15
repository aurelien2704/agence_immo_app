@extends('admin.admin')

{{-- Si le bien immobilier existe, le titre de la page et du h1 est "Modifier le bien immobilier", 
sinon c'est "Ajouter un bien immobilier" --}}
@section('title', $option->id ? 'Modifier le bien immobilier' : 'Ajouter un bien immobilier')

@section('content')
<h1>@yield('title')</h1>

{{-- Formulaire de création ou de modification de bien immobilier, 
qui envoie les données à la route admin.options.store si le bien immobilier n'existe pas, 
ou à la route admin.options.update si le bien immobilier existe --}}
<form action="{{route($option->id ? 'admin.options.update' : 'admin.options.store', $option->id)}}" method="post">
    @csrf

    {{-- Si le bien existe, la méthode du formulaire est PUT, sinon c'est POST --}}
    @method($option
  ->id ? 'PUT' : 'POST')

    {{-- @include fait appel au template de formulaire shared/input.blde.php --}}
    <div class="row">
    <div class="col-8">
    @include('shared.input', [
        'label' => 'Nom de l\'option',
        'name' => 'name',
        'value' => $option->name,
    ])
    </div>
    </div>

    <button type="submit" class="btn btn-primary">
      {{--Si le bien immobilier existe, le bouton affiche "Enregistrer", sinon il affiche "Créer" --}}
    @if ($option->id) Enregistrer
    @else Créer
    @endif
    </button>
@endsection