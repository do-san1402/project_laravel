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
        'product_quantity' =>$row[1],
        'category_id' => $row[2],
        'brand_id' => $row[3],
        'product_desc' => $row[4],
        'meta_keyword' => $row[5],
        'product_price' => $row[6],
        'product_image' => $row[7],
        'product_status' => $row[8],
        'product_image_sp_1' => $row[9],
        'product_image_sp_2' => $row[10],
        'product_image_sp_3' => $row[11],
        'product_cpu' => $row[12],
        'product_ram' => $row[13],
        'product_hard_drive' => $row[14],
        'product_graphics_card' => $row[15],
        'product_screen' => $row[16],
        'product_connector' => $row[17],
        'product_sound' => $row[18],
        'product_keyboard' => $row[19],
        'product_lan' => $row[20],
        'product_wifi' => $row[21],
        'product_bluetooth' => $row[22],
        'product_webcam' => $row[23],
        'product_operating_system' => $row[24],
        'product_pin' => $row[25],
        'product_weight' => $row[26],
        'product_color' => $row[27],
        'product_sold' => $row[28],
        'product_size' => $row[29],
        ]);
    }
}
