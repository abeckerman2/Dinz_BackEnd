<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Menu;

class ParentMenuName extends Model
{
	protected $fillable = [
		'restaurant_id',
		'menu_name',
		'deleted_at',
	];

	public function menu(){
		return $this->hasMany(Menu::class , "parent_menu_id")->where('deleted_at' , Null);
	}

}
