<?php

namespace App\Exports;

use App\Models\SoftwareModel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
//styling excel lewat sini tidak berfungsi

class SoftwareExport implements FromView
{
    public function view(): View
    {
        $software = new SoftwareModel();

        return view('software.v_excelsw', [
            'software' => $software->allData()
        ]);
    }
}
