<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Menu;

class MenuImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Category([
            'categoty_name'  => 	$row['Category Name'],
            'image'          => 	$row['Image'],
            'item_name'      => 	$row['Item Name'],
            'item_type'      => 	$row['Item Type'],
            'price'          => 	$row['Price'],
            'description'    => 	$row['Description'],
        ]);
    }
}