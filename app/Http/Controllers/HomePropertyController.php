<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Http\Requests\SearchPropertiesRequest;

class HomePropertyController extends Controller
{
    /**
     * Récupère les données du Model Property avec les options classé par date de création décroissante
     * 
     * Si le client a soumis un champ recherche validé
     * alors on filtre les biens avec la méthode where()
     * 
     * Récupère tous les biens immobiliers et les affiche dans la vue 'property.index'
     */
    public function index(SearchPropertiesRequest $request)
    {
        $query = Property::query()->with('options')->orderBy('created_at', 'desc');

        if ($inputPrice = $request->validated('price')) {
            $query->where('price', '<=', $inputPrice);
        }

        if ($inputSurface = $request->validated('surface')) {
            $query->where('surface', '>=', $inputSurface);
        }

        if ($inputRooms = $request->validated('rooms')) {
            $query->where('rooms', '>=', $inputRooms);
        }

        if ($inputTitle = $request->validated('title')) {
            $query->where('title', 'like', '%' . $inputTitle . '%');
        }

        return view('property.index', [
            'properties' => $query->get(),
            'input' => $request->validated(),
        ]);
    }

    /**
     * Voir un bien en particulier
     * 
     * Si le slug de l'URL ne correspond pas au slug du bien alors on affiche la page du bien
     * avec le bon slug
     * 
     * Récupère tous les biens immobiliers et les affiche dans la vue 'property.show'
     */
    public function show(string $slug, Property $property)
    {
        $expectedSlug = $property->getSlug();
        if ($slug !== $expectedSlug) {
            return redirect()->route('property.show', [
                'slug' => $expectedSlug,
                'property' => $property
            ]);
        }
        return view('property.show', [
            'property' => $property
        ]);
    }
}
