<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PropertyFormRequest;
use App\Models\Property;
use App\Models\Option;

class PropertyController extends Controller
{
    /**
     * Affiche le fichier admin/properties/index.blade.php avec les biens immobiliers 
     * triés par création décroissante
     */
    public function index()
    {
        return view('admin.properties.index', [
            'properties' => Property::orderBy('created_at', 'desc')->get(),
        ]);
    }

    /**
     * Crée un nouveau bien immobilier vide et affiche le fichier 
     * admin/properties/create.blade.php en lui passant la valeur du bien immobilier
     * 
     * Affiche la liste de toutes les options pour pouvoir les sélectionner dans le formulaire
     */
    public function create()
    {
        return view('admin.properties.form', [
            'property' => new Property(),
            'options' => Option::all(),
        ]);
    }

    /**
     * Crée un nouveau bien immobilier avec les données validées 
     * et redirige vers la page index avec un message de succès
     */
    public function store(PropertyFormRequest $request)
    {
        $property = Property::create($request->validated());
        $property->options()->sync($request->input('options', []));
        return redirect()->route('admin.properties.index')->with('success', 'Le bien immobilier a été créé avec succès.');
    }


    /**
     * Affiche le fichier admin/prpoperties/form.blade.php en récupérant la valeur de $property
     * avec le model binding de Laravel
     * 
     * Affiche la liste de toutes les options pour pouvoir les sélectionner dans le formulaire
     */
    public function edit(Property $property)
    {
        return view('admin.properties.form', [
            'property' => $property,
            'options' => Option::all(),
        ]);
    }

    /**
     * Met à jour le bien immobilier avec les données validées
     * et redirige vers la page index avec un message de succès
     */
    public function update(PropertyFormRequest $request, Property $property)
    {
        $property->update($request->validated());
        $property->options()->sync($request->input('options', []));
        return redirect()->route('admin.properties.index')->with('success', 'Le bien immobilier a été mis à jour avec succès.');
    }

    /**
     * Supprime le bien immobilier et redirige vers la page index avec un message de succès
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('admin.properties.index')->with('success', 'Le bien immobilier a été supprimé avec succès.');
    }
}
