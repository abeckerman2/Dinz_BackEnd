<?php

namespace App\BusinessModel;

use Illuminate\Database\Eloquent\Model;
use App\Restaurant;
use App\RestaurantImage;
use App\RestaurantTiming;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Menu;
use App\Category;
use App\Table;

class RestaurantBusinessModel extends Model
{

	public static function uploadImage($image, $destinationPath){
        $imageName = date('mdYHis') . uniqid() . '.' . str_replace(" ", "_", $image->getClientOriginalExtension());
        $image->move($destinationPath, $imageName);
        return $imageName;
    }

    public function createRestaurant(array $data){
    	$acceptable_files = array_filter($data['acceptable']);
        $non_acceptable_files = array_filter($data['non_acceptable']);

        $explode_accepted_files = explode(',', $acceptable_files[0]);

        if(isset($non_acceptable_files[0]) && !empty($non_acceptable_files[0])){

            $explode_non_accepted_files = explode(',', $non_acceptable_files[0]);



            //#override and remove dupicate array
            $explode_accepted_files = array_diff($explode_accepted_files, $explode_non_accepted_files);

        }


        $files_uploded = $data['files'];

        $files = [];

        foreach ($explode_accepted_files as $acceptable_file) {

            $exp_file = explode('_', $acceptable_file);

            $extension = $files_uploded[$exp_file[0]][$exp_file[1]]->getClientOriginalExtension();

            $file1_thumbname = "";
            if($extension == "jpg" || $extension == "png" || $extension == "jpeg" || $extension == "JPG" || $extension == "PNG" || $extension == "JPEG"){

                $destinationPath = storage_path(). DIRECTORY_SEPARATOR . env('RESTAURANT_IMAGES');
                $file_name = $this->uploadImage($files_uploded[$exp_file[0]][$exp_file[1]], $destinationPath);

                $files[] = ['file_url' => $file_name, 'thumbnail_url' => $file1_thumbname,'file_type' => "image"];
            }


        }

        if($data['restaurant_logo']){
        	$extension_logo = $data['restaurant_logo']->getClientOriginalExtension();

        	if($extension_logo == "jpg" || $extension_logo == "png" || $extension_logo == "jpeg" || $extension_logo == "JPG" || $extension_logo == "PNG" || $extension_logo == "JPEG"){

                $destinationPath = storage_path(). DIRECTORY_SEPARATOR . env('RESTAURANT_LOGO');
                $file_name = $this->uploadImage($data['restaurant_logo'], $destinationPath);

                $data['restaurant_logo'] = $file_name;
            }
        }

        $file_name = date('mdYHis') . uniqid() . '.png';
        $data['qr_code'] = $file_name;
        $restaurant = new Restaurant();
        $restaurant->fill($data);
        $restaurant->save();

        /*Generate QR CODE*/


        $img_store = storage_path() . '/'. env('QR_CODE') . '/' . $file_name;

        $qr_code = \QrCode::format('png')
                         ->size(500)->errorCorrection('H')
                         ->backgroundColor(0,149,235)
                         ->generate($restaurant->id, $img_store);

        foreach ($files as $file) {
        	$restaurant_images = new RestaurantImage();
        	$restaurant_images->restaurant_id = $restaurant->id;
        	$restaurant_images->restaurant_image = $file['file_url'];
        	$restaurant_images->save();
        }

        $i = 1;
        /*default_timing set*/
        for($i; $i <= 7; $i++){
        	$restaurant_timing = new RestaurantTiming();
        	$restaurant_timing->restaurant_id = $restaurant->id;
        	if($i == 1){
        		$restaurant_timing->day = "Sunday";
        		$restaurant_timing->open_time = "08:00:00";
        		$restaurant_timing->close_time = "20:00:00";
        		$restaurant_timing->open_status = 1;
        		$restaurant_timing->close_status = 0;
        	}else if($i == 2){
        		$restaurant_timing->day = "Monday";
        		$restaurant_timing->open_time = "08:00:00";
        		$restaurant_timing->close_time = "20:00:00";
        		$restaurant_timing->open_status = 1;
        		$restaurant_timing->close_status = 0;
        	}else if($i == 3){
        		$restaurant_timing->day = "Tuesday";
        		$restaurant_timing->open_time = "08:00:00";
        		$restaurant_timing->close_time = "20:00:00";
        		$restaurant_timing->open_status = 1;
        		$restaurant_timing->close_status = 0;
        	}else if($i == 4){
        		$restaurant_timing->day = "Wednesday";
        		$restaurant_timing->open_time = "08:00:00";
        		$restaurant_timing->close_time = "20:00:00";
        		$restaurant_timing->open_status = 1;
        		$restaurant_timing->close_status = 0;
        	}else if($i == 5){
        		$restaurant_timing->day = "Thursday";
        		$restaurant_timing->open_time = "08:00:00";
        		$restaurant_timing->close_time = "20:00:00";
        		$restaurant_timing->open_status = 1;
        		$restaurant_timing->close_status = 0;
        	}else if($i == 6){
        		$restaurant_timing->day = "Friday";
        		$restaurant_timing->open_time = "08:00:00";
        		$restaurant_timing->close_time = "20:00:00";
        		$restaurant_timing->open_status = 1;
        		$restaurant_timing->close_status = 0;
        	}else if($i == 7){
        		$restaurant_timing->day = "Saturday";
        		$restaurant_timing->open_time = "08:00:00";
        		$restaurant_timing->close_time = "20:00:00";
        		$restaurant_timing->open_status = 1;
        		$restaurant_timing->close_status = 0;
        	}

        	$restaurant_timing->save();
        }

        return "success";
    }

    public function addItem($data, $restaurant){

        $menu = new Menu();
        $data['restaurant_id'] = $restaurant->id;
        $category_find = Category::find($data['category_id']);
        $data['category_name'] = $category_find->category_name;

        if(isset($data['image'])){
            $extension = $data['image']->getClientOriginalExtension();

            if($extension == "jpg" || $extension == "png" || $extension == "jpeg" || $extension == "JPG" || $extension == "PNG" || $extension == "JPEG"){

                $destinationPath = storage_path(). DIRECTORY_SEPARATOR . env('MENU_IMAGES');
                $file_name = $this->uploadImage($data['image'], $destinationPath);

                $data['image'] = $file_name;
            }
        }

        $menu->fill($data);
        $menu->save();
        return "success";

    }

    public function updateItem($data, $menu_find){
        $category_find = Category::find($data['category_id']);
        $data['category_name'] = $category_find->category_name;
        if(isset($data['image'])){
            $extension = $data['image']->getClientOriginalExtension();

            if($extension == "jpg" || $extension == "png" || $extension == "jpeg" || $extension == "JPG" || $extension == "PNG" || $extension == "JPEG"){

                $destinationPath = storage_path(). DIRECTORY_SEPARATOR . env('MENU_IMAGES');
                $file_name = $this->uploadImage($data['image'], $destinationPath);

                $data['image'] = $file_name;
            }
        }
      
        $menu_find->fill($data);
        $menu_find->update();
        return "success";

    }


    public function addImages(array $data){
        return RestaurantImage::create($data);
    }

    public function updateRestaurant(array $where , array $data){
        return Restaurant::where($where)->update($data);
    }

    public function createTable($data, $restaurant){
        $data['restaurant_id'] = $restaurant->id;
        $data['table_id'] = str_random(4). '_' . mt_rand(1000,9999) . '_' . str_random(4);
        $file_name = date('mdYHis') . uniqid() . '.png';
        $data['qr_code'] = $file_name;

        $img_store = storage_path() . '/'. env('TABLE_QR_CODE') . '/' . $file_name;

        //$scanner_id = base64_encode($restaurant->id).'/'.$data['table_id'];

        $table = new Table();
        $table->fill($data);
        $table->save();


        $base_url = url('website/menu-list');
        $scanner_id = $restaurant->id .'/'.$table->id;
        $qr_code = \QrCode::format('png')
                         ->size(500)->errorCorrection('H')
                         // ->backgroundColor(0xff, 0xff, 0xcc)
                         // ->backgroundColor(204,0,0)
                         ->generate($base_url.'/'.$scanner_id, $img_store);
        
        return "success";

    }


}
