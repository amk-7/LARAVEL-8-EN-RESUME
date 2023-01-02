<?php

namespace App\Exports;

use App\Models\Evenement;
use Maatwebsite\Excel\Concerns\FromCollection;

class EvenementExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Evenement::all();
    }
}
