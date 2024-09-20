<?php

namespace App\Http\Controllers\Player\Auth;

use App\Http\Controllers\Controller;
use App\Models\Jogador;
use App\Models\Treinador;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nome' => 'required|string',
            'username' => 'required|string|unique:jogador',
            'data_nascimento' => 'required',
            'senha' => ['required'],
        ]);

        $treinador = Treinador::create([
            'nome' => $request->nome,
        ]);

        $player = Jogador::create([
            'username' => $request->username,
            'data_nascimento' => $request->data_nascimento,
            'senha' => Hash::make($request->senha),
            'codigo_treinador' => $treinador->codigo_treinador //Anexa a FK
        ]);

        event(new Registered($player));

        Auth::guard('player')->login($player);

        return redirect(RouteServiceProvider::HOME);
    }
}
