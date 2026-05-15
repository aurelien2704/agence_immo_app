{{-- Page qui affiche tous les biens immobiliers --}}

@extends('admin.admin')

{{-- Titre de la page et du h1 --}}
@section('title', 'Toutes les options')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>@yield('title')</h1>

    {{-- Bouton qui redirige vers la page de création de bien --}}
    <a href="{{ route('admin.options.create') }}" class="btn btn-primary">
      Ajouter une option</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th class="text-end">Actions</th>
        </tr>
    </thead>
    <tbody>
      {{-- Parcourt la liste des biens immobiliers --}}
        @foreach ($options as $option)
            <tr>
                <td>{{ $option->name }}</td>
                <td>
                    <div class="d-flex justify-content-end gap-2">
                        {{-- Bouton qui redirige vers la page de modification du bien --}}
                        <a href="{{ route('admin.options.edit', $option->id) }}" class="btn btn-sm btn-primary">
                          Modifier</a>

                        {{-- Formulaire de suppression du bien, qui envoie une requête DELETE à la route admin.options.destroy --}}
                        <form action="{{ route('admin.options.destroy', $option->id) }}" method="post" 
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

