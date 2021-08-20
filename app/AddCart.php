<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Menu;

class AddCart extends Model
{
    protected $fillable = [
        'user_id',
    	'restaurant_id',
    	'table_id',
        'menu_id',
        'quantity',
        'instructions',
        'user_ip',
    ];

    public function menu(){
    	return $this->belongsTo(Menu::class);
    }
    
}
