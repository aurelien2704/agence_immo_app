@extends('admin.admin')

{{-- Si le bien immobilier existe, le titre de la page et du h1 est "Modifier le bien immobilier", 
sinon c'est "Ajouter un bien immobilier" --}}
@section('title', $property->id ? 'Modifier le bien immobilier' : 'Ajouter un bien immobilier')

@section('content')
<h1>@yield('title')</h1>

{{-- Formulaire de création ou de modification de bien immobilier, 
qui envoie les données à la route admin.properties.store si le bien immobilier n'existe pas, 
ou à la route admin.properties.update si le bien immobilier existe --}}
<form action="{{route($property->id ? 'admin.properties.update' : 'admin.properties.store', $property->id)}}" method="post">
    @csrf

    {{-- Si le bien existe, la méthode du formulaire est PUT, sinon c'est POST --}}
    @method($property->id ? 'PUT' : 'POST')

    {{-- @include fait appel au template de formulaire shared/input.blde.php --}}
    <div class="row">
    <div class="col-8">
    @include('shared.input', [
        'label' => 'Titre',
        'name' => 'title',
        'value' => $property->title,
    ])
    </div>
    </div>

    <div class="row">
    <div class="col-4">
    @include('shared.input', [
        'label' => 'Surface',
        'name' => 'surface',
        'type' => 'number',
        'value' => $property->surface,
    ])
    </div>
    <div class="col-4">
    @include('shared.input', [
        'label' => 'Prix',
        'name' => 'price',
        'type' => 'number',
        'value' => $property->price,
    ])
    </div>
    <div class="col-4">
    @include('shared.input', [
        'label' => 'Etage',
        'name' => 'floor',
        'type' => 'number',
        'value' => $property->floor,
    ])
    </div>
    </div>

    <div class="row">
    @include('shared.input', [
        'label' => 'Description',
        'name' => 'description',
        'type' => 'textarea',
        'value' => $property->description,
        'rows' => 5,
    ])
    </div>

    <div class="row">
    <div class="col-md-4">
    @include('shared.input', [
        'label' => 'Adresse',
        'name' => 'adress',
        'value' => $property->adress,
    ])
    </div>

    <div class="col-md-4">
    @include('shared.input', [
        'label' => 'Code postal',
        'name' => 'postal_code',
        'value' => $property->postal_code,
    ])
    </div>

    <div class="col-md-4">
    @include('shared.input', [
        'label' => 'Ville',
        'name' => 'city',
        'value' => $property->city,
    ])
    </div>
    </div>

    <div class="row">
    <div class="col-4">
    @include('shared.input', [
        'label' => 'Pièces',
        'name' => 'rooms',
        'type' => 'number',
        'value' => $property->rooms,
    ])
    </div>

    <div class="col-4">
    @include('shared.input', [
        'label' => 'Chambres',
        'name' => 'bedrooms',
        'type' => 'number',
        'value' => $property->bedrooms,
    ])
    </div>
    </div>

    <div class="form-check form-switch my-3">
        <input type="hidden" name="sold" value="0">
        <input class="form-check-input" type="checkbox" value="1" id="sold" name="sold" {{ $property->sold ? 'checked' : '' }} role="switch">
        <label class="form-check-label" for="sold">Vendu</label>
    </div>

    <button type="submit" class="btn btn-primary">
      {{--Si le bien immobilier existe, le bouton affiche "Enregistrer", sinon il affiche "Créer" --}}
    @if ($property->id) Enregistrer
    @else Créer
    @endif
    </button>
@endsection