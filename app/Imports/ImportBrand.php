<?php

namespace App\Imports;

use App\Models\BrandModel;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportBrand implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new BrandModel([
            'brand_name' => $row[0],
            'brand_desc' => $row[1],
            'brand_status' => $row[2],
            'meta_keyword' => $row[3],
        ]);
    }
}
