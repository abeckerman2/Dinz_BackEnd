<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Menu;
class OrderItem extends Model
{
    protected $fillable = [
    	'user_id',
    	'order_id',
    	'menu_id',
    	'quantity',
    	'item_price',
    	'amount',
        'instructions'
    ];

    public function menu(){
    	return $this->belongsTo(Menu::class);
    }
}
