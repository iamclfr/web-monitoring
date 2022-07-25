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
                ->where('domaine_id', '==', $domaine->id)
                ->sortByDesc('updated_at')
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'domaine_id' => 'required',
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

    public function edit(Domaine $domaine, Sauvegarde $sauvegarde)
    {
        return view('wordpress.edit-sauvegarde', [
            'domaine'   => $domaine,
            'sauvegarde' => $sauvegarde
        ]);
    }

    public function update(Domaine $domaine, Sauvegarde $sauvegarde)
    {
        $attributes = request()->validate([
            'version' =>  'required',
            'etat_sante'   =>  'required',
            'poids'   =>  'required',
            'backup'    =>  'required',
        ]);

        $attributes['slug'] = Str::random(20);
        $attributes['commentaire'] = request()->commentaire;

        $sauvegarde->update($attributes);

        return redirect('/wordpress/' . $domaine->slug)->with('success', 'Sauvegarde Mis à Jour !');
    }

    public function destroy(Domaine $domaine, Sauvegarde $sauvegarde)
    {
        $sauvegarde->delete();

        return redirect('/wordpress/' . $domaine->slug);
    }
}
