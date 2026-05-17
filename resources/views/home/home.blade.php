{{-- Page d'accueil --}}

@extends('home.base')

@section('content')

<div class="bg-light p-5 mb-5 text-center">
  <div class="container">
    <h1 class="mb-4">Agence Lorem Ipsum</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
  </div>
</div>


  <div class="container">
    <h2>Nos derniers biens immobiliers</h2>
    <div class="row">
      {{-- Parcourt la liste des biens immobiliers --}}
      @foreach ($properties as $property)
        <div class="col-lg-4">
          {{-- Affiche la carte du fichier card.blade.php --}}
          @include('property.card')
        </div>
      @endforeach
    </div>
  </div>
          

@endsection