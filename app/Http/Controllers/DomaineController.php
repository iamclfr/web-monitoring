<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
use App\Models\Sauvegarde;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DomaineController extends Controller
{
    public function index()
    {
        return view('wordpress.index', [
            'domaines' => Domaine::all()
                ->where('type_site', '==', 'WordPress')
                ->sortBy('domaine')
        ]);
    }

    public function show(Domaine $domaine)
    {
        return view('wordpress.show', [
            'domaine' => $domaine,
            'sauvegardes' => Sauvegarde::all()
                ->where('id_domaine', '==', $domaine->id)
                ->sortBy('created_at')
        ]);
    }
    public function store()
    {
        $attributes = request()->validate([
            'type_site' =>  'required',
            'serveur'   =>  'required',
            'php_version'   =>  'required',
            'backoffice'    =>  'required'
        ]);

        $attributes['domaine'] = Str::lower(request()->domaine);
        $attributes['slug'] = Str::slug(request()->domaine, '-');

        Domaine::create($attributes);

        return redirect('/wordpress')->with('success', 'Domaine ajouté !');
    }
}
