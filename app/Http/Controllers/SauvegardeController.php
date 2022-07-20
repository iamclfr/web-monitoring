<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
use App\Models\Sauvegarde;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SauvegardeController extends Controller
{
    public function index(Domaine $domaine)
    {
        return view('wordpress.show', [
            'domaine' => $domaine,
            'sauvegardes' => Sauvegarde::all()
                ->where('id_domaine', '==', $domaine->id)
                ->sortBy('updated_at')
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'id_domaine' => 'required',
            'version' =>  'required',
            'etat_sante'   =>  'required',
            'poids'   =>  'required',
            'backup'    =>  'required',
        ]);

        $attributes['slug'] = Str::random(20);
        $attributes['commentaire'] = request()->commentaire;

        Sauvegarde::create($attributes);

        return back()->with('success', 'Sauvegarde ajouté !');
    }
}
