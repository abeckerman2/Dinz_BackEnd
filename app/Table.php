<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
class Table extends Model
{
    protected $fillable = [
    	'restaurant_id',
    	'table_id',
    	'table_name',
    	'qr_code',
    	'is_occupied',
        'assign_menu_id',
        'assign_document_id',
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

    public function activeOrders(){
        return $this->hasMany(Order::class)->where('order_status','!=','completed')->whereOrderType('placed_order')->whereDeletedAt(null);
    }

    public function serverWaiters(){
        return $this->hasMany(Order::class)->where('order_status','!=','completed')->whereOrderType('server_waiter')->whereDeletedAt(null);
    }

    public function activeOrdersWithOrderItem(){
        return $this->hasMany(Order::class)->where('order_status','!=','completed')->where('order_type' , 'placed_order')->orderBy('id','desc')->whereDeletedAt(null)->with('orderItemsWithMenu');
    }



    public function requestWaiter(){
        return $this->hasMany(Order::class)->where('order_status','!=','completed')->where('order_type' , 'server_waiter')->orderBy('id','desc')->whereDeletedAt(null)->with('orderItemsWithMenu' , 'user');
    }



}
