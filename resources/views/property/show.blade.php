{{-- Page de détail d'un bien immobilier --}}

@extends('home.base')

@section('title', $property->title)

@section('content')

<div class="container mt-5">
<h1>{{ $property->title }}</h1>
<h2>{{$property->rooms}} pièces - {{ $property->surface }} m²</h2>

<h3 class="text-primary fw-bold">${{ number_format($property->price, thousands_separator: ' ') }} €</h3>

<h2 class="mt-4"> Caractéristiques </h2>
<table class="table table-striped">
  <tr>
    <td>Localisation</td>
    <td>{{ $property->adress }} - {{ $property->postal_code }} {{ $property->city }}</td>
  </tr>
  <tr>
    <td>Surface</td>
    <td>{{ $property->surface }} m²</td>
  </tr>
  <tr>
    <td>Prix</td>
    <td>${{ number_format($property->price, thousands_separator: ' ') }} €</td>
  </tr>
  <tr>
    <td>Nombre de pièces</td>
    <td>{{ $property->rooms }}</td>
  </tr>
  <tr>
    <td>Nombre de chambres</td>
    <td>{{ $property->bedrooms }}</td>
  </tr>
  <tr>
    <td>Etage</td>
    <td>{{ $property->floor ?: "Rez-de-chaussée" }}</td>
  </tr>
  {{-- Parcourt la liste des options du bien immobilier --}}
  @foreach ($property->options as $option)
  <tr>
    <td>Options</td>
    <td>{{ $option->name }}</td>
  </tr>
  @endforeach
</table>
</div>

{{-- Formulaire de contact --}}
<div class="container mt-4">
  <h4>Intéressé par ce bien ?</h4>
   {{-- Affiche un message de succès si la session contient une clé 'success' --}}
    @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif
<form action="{{ route('property.contact', $property )}}" method="post">
  @csrf
    <div class="row">
    <div class="col-md-6">
    @include('shared.input', [
        'label' => 'Prénom',
        'name' => 'firstname'
    ])
    </div>

    <div class="col-md-6">
    @include('shared.input', [
        'label' => 'Nom',
        'name' => 'lastname'
    ])
    </div>

    <div class="col-md-6">
    @include('shared.input', [
        'label' => 'Email',
        'name' => 'email',
        'type' => 'email'
    ])
    </div>

    <div class="col-md-6">
    @include('shared.input', [
        'label' => 'Téléphone',
        'name' => 'phone'
    ])
    </div>

    <div class="col">
    @include('shared.input', [
        'label' => 'Votre message',
        'name' => 'message',
        'type' => 'textarea'
    ])
    </div>
    </div>

<div>
  <button type="submit" class="btn btn-primary">Envoyer</button>
</div>
</form>
</div>

@endsection

