<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class HomeController extends Controller
{
    /**
     * Affiche le fichier home.blade.php avec les biens immobiliers sur la page d'accueil 
     * triés par création décroissante et limités à 4 biens immobiliers
     */
    public function index()
    {
        return view('home.home', [
            'properties' => Property::orderBy('created_at', 'desc')->limit(4)->get(),
        ]);
    }
}
