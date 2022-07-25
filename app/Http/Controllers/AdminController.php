<?php

namespace App\Http\Controllers;

use App\Exports\DomainesExport;
use App\Imports\DomainesImport;
use App\Models\Domaine;
use App\Models\Sauvegarde;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'domaines' => Domaine::all(),
            'sauvegardes' => Sauvegarde::all(),
            'etat_bien' => Sauvegarde::where('etat_sante','Bien')->count(),
            'etat_moyen' => Sauvegarde::where('etat_sante','Moyen')->count(),
            'etat_mauvais' => Sauvegarde::where('etat_sante','Mauvais')->count()
        ]);
    }

    public function import()
    {
        return view('admin.import');
    }

    public function store(Request $request)
    {
        Excel::import(new DomainesImport(), $request->file('file'));

        return redirect('/wordpress')->with('success', 'Les Domaines ont étaient Importé !');
    }

    public function export()
    {
        return view('admin.export', [
            'domainesTotal' => Domaine::all()->count()
        ]);
    }

    public function download()
    {
        return Excel::download(new DomainesExport(), 'Web-Monitoring-Domains-Export.csv');
    }
}
