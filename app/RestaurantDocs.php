<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantDocs extends Model
{
    protected $fillable  = [
    	'restaurant_id',
        'document_name',
    	'file_type',
    	'file',
        'qr_code_name',
        'deleted_at',
    ];


   

    public function getFileAttribute($value){

        if(!empty($value)){

            $path_img = public_path(). '/storage/restaurant/restaurant_docs' . '/' . $value;

            if(file_exists($path_img)){
                return url('public/storage/restaurant/restaurant_docs') . "/" . $value;
            }else{

                return url('public/restaurant/assets/img/add-mul.png');
            } 
        }else{
            return $value;
        }
    }



    public function getQrCodeNameAttribute($value){
        $path  = url('public/storage/restaurant/restaurant_docs_qr_code');
        if($value != ''){
            $final_doc_path = $path.'/'.$value;
            return $final_doc_path;
        }else{
            return url('public/restaurant/assets/img/add-mul.png');
        }
    }




}
