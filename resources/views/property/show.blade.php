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

@endsection

