<?php

namespace App\Exports;

use App\Models\BrandModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportBrand implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BrandModel::all();
    }
}