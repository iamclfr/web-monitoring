<?php

namespace App\Imports;

use App\Models\Domaine;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;

class DomainesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Domaine([
            'slug' => Str::slug($row[0], '-'),
            'domaine' => $row[0],
            'type_site' => $row[1],
            'serveur'   => $row[2],
            'php_version' => $row[3],
            'backoffice' => $row[4]
        ]);
    }
}
