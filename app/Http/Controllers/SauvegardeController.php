<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
use App\Models\Sauvegarde;
use Illuminate\Http\Request;

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
}
