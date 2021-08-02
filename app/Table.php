<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $fillable = [
    	'restaurant_id',
    	'table_id',
    	'table_name',
    	'qr_code',
    	'is_occupied'
    ];


    public function getQrCodeAttribute($value){

        if(!empty($value)){

            $path_img = public_path(). '/storage/restaurant/table_qr' . '/' . $value;

            if(file_exists($path_img)){
                return url('/') . '/' . env('TABLE_QR_CODE_VIEW') . '/' . $value;
            }else{

                return "";
            } 
        }else{
            return $value;
        }
    }
}
