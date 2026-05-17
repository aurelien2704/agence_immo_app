<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    /**
     * Affiche le formulaire de connexion
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Authentifie l'utilisateur
     * 
     * Si les identifiants sont corrects alors on redirige vers la page d'administration des biens immobiliers
     * Sinon on redirige vers la page de connexion avec un message d'erreur
     */

    public function authenticate(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.properties.index'));
        }
        return back()->withErrors([
            'email' => 'Identifiants incorrects',
        ])->onlyInput('email');
    }

    /**
     * Déconnecte l'utilisateur
     * On invalide la session et on régénère le token CSRF
     * Ensuite on redirige vers la page de connexion
     */

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
