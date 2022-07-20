<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
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

        return back()->with('success', 'Domaine ajouté !');
    }

    public function edit(Domaine $domaine)
    {
        return view('wordpress.edit', [
            'domaine' => $domaine
        ]);
    }

    public function update(Domaine $domaine)
    {
        $attributes = request()->validate([
            'type_site' =>  'required',
            'serveur'   =>  'required',
            'php_version'   =>  'required',
            'backoffice'    =>  'required'
        ]);

        $attributes['domaine'] = Str::lower(request()->domaine);
        $attributes['slug'] = Str::slug(request()->domaine, '-');

        $domaine->update($attributes);

        return redirect('/wordpress')->with('success', 'Domaine Mis à Jour !');
    }
}
