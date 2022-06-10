<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportProduct implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
        'product_name' => $row[0],
        'category_id' => $row[1],
        'brand_id' => $row[2],
        'product_desc' => $row[3],
        'meta_keyword' => $row[4],
        'product_price' => $row[5],
        'product_image' => $row[6],
        'product_status' => $row[7],
        'product_image_sp_1' => $row[8],
        'product_image_sp_2' => $row[9],
        'product_image_sp_3' => $row[10],
        'product_cpu' => $row[11],
        'product_ram' => $row[12],
        'product_hard_drive' => $row[13],
        'product_graphics_card' => $row[14],
        'product_screen' => $row[15],
        'product_connector' => $row[16],
        'product_sound' => $row[17],
        'product_keyboard' => $row[18],
        'product_lan' => $row[19],
        'product_wifi' => $row[20],
        'product_bluetooth' => $row[21],
        'product_webcam' => $row[22],
        'product_operating_system' => $row[23],
        'product_pin' => $row[24],
        'product_weight' => $row[25],
        'product_color' => $row[26],
        'product_size' => $row[27],
        ]);
    }
}
