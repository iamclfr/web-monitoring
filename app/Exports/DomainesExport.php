<?php

namespace App\Exports;

use App\Models\Domaine;
use Maatwebsite\Excel\Concerns\FromCollection;

class DomainesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Domaine::all();
    }
}
