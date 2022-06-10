<?php

namespace App\Imports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportExcel implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Category([
            'category_name' => $row[0],                                                             
            'category_desc' =>  $row[1],                    
            'meta_keyword' => $row[2],
            'category_status' => $row[3],
        ]);
    }
}
