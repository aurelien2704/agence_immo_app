{{-- Carte d'afffichage général d'un bien immobilier --}}
{{-- On récupère les property du bien --}}

<div class="card p-3 mt-4">
  <div class="card-body"> 
    <h5 class="card-title">{{ $property->title }}</h5>
    <p class="card-text">{{ $property->surface }} m² - {{ $property->city }} - {{ $property->postal_code }} €
      {{-- On récupère les options du bien --}}
      @foreach ($property->options as $option)
        <span class="badge bg-secondary">{{ $option->name }}</span>
      @endforeach
    </p>

    <div class="d-flex justify-content-between align-items-center">
      <div class="text-primary" style="font-size: 1.4em; font-weight: bold;">
      {{ number_format($property->price, thousands_separator: ' ') }} €
      </div>
    
      <div>
        {{-- Redirige vers la page détaillée du bien avec son slug et ID --}}
        <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property->id]) }}" class="btn btn-primary">Voir le bien</a>
      </div>
    </div>
  </div>
</div>