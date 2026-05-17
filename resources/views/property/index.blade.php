@extends('home.base')

@section('title', 'Biens immobiliers')

@section('content')

{{-- Formulaire de filtrage --}}
<div class="bg-light p-5 mb-5 text-center">
  <form action="" method="get" class="container d-flex gap-2">

    {{-- Filtrage par prix maximal --}}
    <input 
    type="number" 
    placeholder="Budget max" 
    name="price" 
    {{-- La valeur de filtre correspond à celle de l'input, sinon vide --}}
    value="{{ $input['price'] ?? '' }}" 
    class="form-control"
    >

    {{-- Filtrage par surface minimale --}}
    <input 
    type="number" 
    placeholder="Surface min (en m²)" 
    name="surface" 
    {{-- La valeur de filtre correspond à celle de l'input, sinon vide --}}
    value="{{ $input['surface'] ?? '' }}" 
    class="form-control"
    >

        {{-- Filtrage par nombre de pièces minimum --}}
    <input 
    type="number" 
    placeholder="Pièces min" 
    name="rooms" 
    {{-- La valeur de filtre correspond à celle de l'input, sinon vide --}}
    value="{{ $input['rooms'] ?? '' }}" 
    class="form-control"
    >

    {{-- Filtrage par mot clé --}}
    <input 
    type="text" 
    placeholder="Mot clé" 
    name="title" 
    {{-- La valeur de filtre correspond à celle de l'input, sinon vide --}}
    value="{{ $input['title'] ?? '' }}" 
    class="form-control"
    >

    <button type="submit" class="btn btn-primary">Rechercher</button>
  </form>

  </div>
</div>

<div class="container">
  <div class="row">
      {{-- Parcourt la liste des biens immobiliers --}}
      @foreach ($properties as $property)
        <div class="col-lg-6">
          {{-- Affiche la carte du fichier card.blade.php --}}
          @include('property.card')
        </div>
      @endforeach
    </div>
</div>
@endsection