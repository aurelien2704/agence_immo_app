{{-- Page qui affiche tous les biens immobiliers --}}

@extends('admin.admin')

{{-- Titre de la page et du h1 --}}
@section('title', 'Tous les biens immobiliers')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>@yield('title')</h1>

    {{-- Bouton qui redirige vers la page de création de bien --}}
    <a href="{{ route('admin.properties.create') }}" class="btn btn-primary">
      Ajouter un bien</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Surface</th>
            <th>Prix</th>
            <th>Ville</th>
            <th class="text-end">Actions</th>
        </tr>
    </thead>
    <tbody>
      {{-- Parcourt la liste des biens immobiliers --}}
        @foreach ($properties as $property)
            <tr>
                <td>{{ $property->title }}</td>
                <td>{{ $property->surface }}m²</td>
                <td>{{ number_format($property->price, thousands_separator: ' ') }}€</td>
                <td>{{ $property->city }}</td>
                <td>
                    <div class="d-flex justify-content-end gap-2">
                        {{-- Bouton qui redirige vers la page de modification du bien --}}
                        <a href="{{ route('admin.properties.edit', $property->id) }}" class="btn btn-sm btn-primary">
                          Modifier</a>

                        {{-- Formulaire de suppression du bien, qui envoie une requête DELETE à la route admin.properties.destroy --}}
                        <form action="{{ route('admin.properties.destroy', $property->id) }}" method="post" 
                            onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce bien ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

