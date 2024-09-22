<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Treinador;
use App\Models\PokemonCapturado;
use App\Models\PokemonSelvagem;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'player' => $request->user(),
            'treinador' => Treinador::find($request->user()->codigo_treinador)
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {

        $treinador = Treinador::find($request->user()->codigo_treinador);

        $file = $request->file('foto');
        $file->storeAs('public/treinador', $file->getClientOriginalName());
        
        $treinador->update([
            'nome' => $request->input('nome'),
            'frase_especial' => $request->input('frase_especial'),
            'foto' => $file->getClientOriginalName(),
        ]);

        
        $request->user()->fill($request->validated());

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'senha' => ['required'],
        ]);

        $user = $request->user();

        $idTreinadorLogado = auth()->guard('player')->user()->codigo_treinador;
        $pokemons = PokemonCapturado::where('id_treinador', '=', $idTreinadorLogado)->get();

        foreach($pokemons as $pokemon) {
            //dd($pokemon->id_pokemon);
            PokemonSelvagem::create([
                'id_pokemon' => $pokemon->id_pokemon
            ]);

            PokemonCapturado::destroy($pokemon->id_pokemon);
        }

        //dd($pokemons);

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
