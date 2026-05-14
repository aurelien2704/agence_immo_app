{{-- Cette vue permet de créer un template de formulaire afin d'éviter de répéter le même code pour chaque 
champ du formulaire de création ou de modification de bien immobilier.--}}

{{-- Valeurs par défaut --}}
@php
$label ??= null;
$type ??= 'text';
$class ??= null;
$name ??= '';
$value ??= '';
$rows ??= null;
@endphp

<div class="my-3 {{ $class }}">
    <label for="{{ $name }}">{{ $label }}</label>
    
    {{-- Si le type de l'input est textarea, affiche une balise textarea au lieu d'une balise input --}}
    @if ($type === 'textarea')
    <textarea
    class="form-control @error($name) is-invalid @enderror"
    name="{{ $name }}"
    id="{{ $name }}"
    rows="{{ $rows }}"
    >{{ old($name, $value) }}</textarea>
    @else
    
    {{-- Si le type de l'input n'est pas textarea, affiche une balise input --}}
    <input
    {{-- Si le nom a une erreur de validation, ajoute la classe is-invalid à l'input --}}
    class="form-control @error($name) is-invalid @enderror" 
    type="{{ $type }}" 
    name="{{ $name }}" 
    id="{{ $name }}"
    rows="{{ $rows }}"
    value="{{ old($name, $value) }}"
    >
    @endif
</div> 