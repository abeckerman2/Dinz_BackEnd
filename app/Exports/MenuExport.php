<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Auth;
use App\Menu;
use DB;
use Session;

class MenuExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	$restauarnt_id = Auth::guard('restaurant')->user()->id;

        $parent_menu_id = Session::get('parent_menu_id'); 

        return DB::table('menus')->where('restaurant_id' , $restauarnt_id)->where('parent_menu_id' , $parent_menu_id)->select('category_name' , 'image' , 'item_name' , 'item_type' , 'price' , 'description')->orderBy("id" , "desc")->get();


        /*return DB::table('menus')->where('restaurant_id' , $restauarnt_id)->select('category_name' , 'image' , 'item_name' , 'item_type' , 'price' , 'description' , \DB::raw('(CASE
                        WHEN menus.is_available = "1" THEN "Available"
                        ELSE "Un-available" 
                        END) AS is_available'))->orderBy("id" , "desc")->get();*/

    }

    public function headings(): array
    {
        return [
            'Category Name',
            'Image',
            'Item Name',
            'Item Type',
            'Price($)',
            'Description',
            // 'is_available',
        ];
    }

}
