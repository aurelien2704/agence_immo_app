<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Http\Requests\Admin\OptionFormRequest;

class OptionController extends Controller
{
    /**
     * Affiche le fichier admin/options/index.blade.php avec les options 
     * triées par création décroissante
     */
    public function index()
    {
        return view('admin.options.index', [
            'options' => Option::get(),
        ]);
    }

    /**
     * Crée une nouvelle option vide et affiche le fichier 
     * admin/options/create.blade.php en lui passant la valeur de l'option
     */
    public function create()
    {
        return view('admin.options.form', [
            'option' => new Option(),
        ]);
    }

    /**
     * Crée une nouvelle option avec les données validées 
     * et redirige vers la page index avec un message de succès
     */
    public function store(OptionFormRequest $request, Option $option)
    {
        $option = Option::create($request->validated());
        return redirect()->route('admin.options.index')->with('success', 'L\'option a été créée avec succès.');
    }


    /**
     * Affiche le fichier admin/options/form.blade.php en récupérant la valeur de $option
     * avec le model binding de Laravel
     */
    public function edit(Option $option)
    {
        return view('admin.options.form', [
            'option' => $option
        ]);
    }

    /**
     * Met à jour l'option avec les données validées
     * et redirige vers la page index avec un message de succès
     */
    public function update(OptionFormRequest $request, Option $option)
    {
        $option->update($request->validated());
        return redirect()->route('admin.options.index')->with('success', 'L\'option a été mise à jour avec succès.');
    }

    /**
     * Supprime l'option et redirige vers la page index avec un message de succès
     */
    public function destroy(Option $option)
    {
        $option->delete();
        return redirect()->route('admin.options.index')->with('success', 'L\'option a été supprimée avec succès.');
    }
}
