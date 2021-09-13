<?php

namespace App\Http\Controllers\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
header('Cache-Control: no-store, private, no-cache, must-revalidate');
header('Cache-Control: pre-check=0, post-check=0, max-age=0, max-stale = 0', false);

use Session;
use Artisan;
use Carbon\Carbon;
use DB;
use App\Validation;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Auth;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Redirect;
use Illuminate\Support\Facades\Input;
use Mail;
use App\Category;
use App\BusinessModel\RestaurantBusinessModel;
use App\Menu;
use App\AddCart;
use App\MenuImages;
use App\Exports\MenuExport;
use Excel;
use App\Imports\MenuImport;
use File;
use App\ParentMenuName;
use App\Table;


class MenuManagementController extends Controller
{

	public function restaurantBusinessModel(){
		return new RestaurantBusinessModel();
	}




    public function menuManagement(Request $request , $id){
        Session::put('parent_menu_id' , $id);
    	$restaurant = Auth()->guard('restaurant')->user();
    	$menus = Menu::whereDeletedAt(null)->whereRestaurantId($restaurant->id)->where('parent_menu_id' , $id)->orderBy('id','desc')->get();

        $main_menu_details = ParentMenuName::where('id' , $id)->first();

        return view('restaurant.menu-management' ,compact('menus' , 'main_menu_details'));
    }
    

    public function addItem(Request $request){

    	if($request->isMethod('GET')){
            $parent_menu_id = Session::get('parent_menu_id'); 

    		$categories = Category::whereDeletedAt(null)->get();
        	return view('restaurant.add-item',compact('categories' , 'parent_menu_id'));
    	}

    	if($request->isMethod('POST')){
            $parent_menu_id = Session::get('parent_menu_id'); 

    		$restaurant = Auth()->guard('restaurant')->user();

            // $check_item_name_already_exist = Menu::where('parent_menu_id' , $parent_menu_id)->where('restaurant_id' , $restaurant->id)->where('item_name' , $request->item_name)->where('deleted_at' , null)->first();

            // if($check_item_name_already_exist){
            //     return back()->with('error' , 'Item name is already exist.');
            // }



            $data = $request->all();
            $data['item_name'] = ucfirst($data['item_name']);
            $data['parent_menu_id'] = $parent_menu_id;


    		$add_item = $this->restaurantBusinessModel()->addItem($data, $restaurant);
    		return redirect('restaurant/menu-management'.'/'.$parent_menu_id)->with('success' , 'Item has been added successfully.'); 
    	}
    }


    public function addItemFromManagementPage(Request $request , $id){

        if($request->isMethod('GET')){
            $parent_menu_id = $id;

            $categories = Category::whereDeletedAt(null)->get();
            return view('restaurant.add_item_outer',compact('categories' , 'parent_menu_id'));
        }

        if($request->isMethod('POST')){
            $parent_menu_id = $id;

            $data = $request->all();
            $data['item_name'] = ucfirst($data['item_name']);
            $data['parent_menu_id'] = $parent_menu_id;


            $restaurant = Auth()->guard('restaurant')->user();
            $add_item = $this->restaurantBusinessModel()->addItem($data, $restaurant);
            return redirect('restaurant/menu-management'.'/'.$parent_menu_id)->with('success' , 'Item has been added successfully.'); 
        }
    }
    

    public function editItem(Request $request){
    	if($request->isMethod('GET')){
            $parent_menu_id = Session::get('parent_menu_id'); 

    		$menu_id = base64_decode($request->menu_id);
	    	$menu_find = Menu::find($menu_id);
	    	$categories = Category::whereDeletedAt(null)->get();
	        return view('restaurant.edit-item',compact('menu_find','categories' , 'parent_menu_id'));
    	}

    	if($request->isMethod('POST')){

            $parent_menu_id = Session::get('parent_menu_id'); 

    		$data = $request->all();
            $data['item_name'] = ucfirst($data['item_name']);
    		$menu_id = base64_decode($request->menu_id);
    		$menu_find = Menu::find($menu_id);
    		$edit_item = $this->restaurantBusinessModel()->updateItem($data, $menu_find);
    		return redirect('restaurant/menu-management'.'/'.$parent_menu_id)->with('success' , 'Item has been updated successfully.'); 
    	}
    }

    public function availUnavail(Request $request){

    	if($request->status == 1){
    		Menu::whereId($request->menu_id)->update(['is_available' => 2]);
    	}else{
    		Menu::whereId($request->menu_id)->update(['is_available' => 1]);
    	}

    	return ['status' => $request->status];
    }

    public function deleteItem(Request $request){
        $parent_menu_id = Session::get('parent_menu_id'); 

        $menu_id = $request->delete_item_id;
        Menu::whereId($menu_id)->update(['deleted_at' => Carbon::now()]);
        AddCart::where('menu_id' , $menu_id)->delete();
        return redirect('restaurant/menu-management'.'/'.$parent_menu_id)->with('success' , 'Item has been deleted successfully.'); 
    }



    private function uploadProfile($destinationPath,$image){
        // $imageName = date('mdY') . uniqid().'.'.$image->getClientOriginalExtension();
        $imageName = rand(100000,999999).'.'.$image->getClientOriginalExtension();

        $image->move($destinationPath, $imageName);
        return $imageName;
    }



    public function menuImages(Request $request){
        $restaurant_id = Auth::guard('restaurant')->user()->id;
        if($request->isMethod("GET")){
            $menu_images = MenuImages::where('restaurant_id' , $restaurant_id)->where('deleted_at' , null)->orderBy('id' , 'desc')->paginate(15);
            return view('restaurant/menu_images' , compact('menu_images'));
        }
        if($request->isMethod('POST')) {

            $menu_images = $request->hasfile("menu_images");
            if(!empty($menu_images)  && $menu_images) {
                $files = $request->file('menu_images');
                $destinationPath = storage_path(). DIRECTORY_SEPARATOR . "app/public/restaurant/menu_gallery_images";
                
                $restaurant_id = Auth::guard('restaurant')->user()->id;


                foreach ($request->file('menu_images') as $images) {
                    $image = $this->uploadProfile($destinationPath,$images);

                    $data = [
                        'restaurant_id' => $restaurant_id,
                        'menu_image' => $image,
                    ];


                    $add_menu_images = MenuImages::create($data); 
                }
            }
            Session::flash('success', 'Menu images has been uploaded successfully.');
            return redirect(url('restaurant/menu-images'));

        }
    }



    public function deleteMenuImages(Request $request) {
        $menu_image_id =  $request->delete_single_image_id;

        if(!empty($menu_image_id)  && $menu_image_id)  {
            $deleteMenuImage = MenuImages::where('id' , $menu_image_id)->update(['deleted_at' => Carbon::now()]);
            Session::flash('success', 'Menu image has been deleted successfully.');
            return redirect(url('restaurant/menu-images'));
        } else {
            Session::flash('danger', "Unable to proceed your request, Please try later");
                return redirect(url('restaurant/menu-images'));
        }
        
    }




    public function exportMenu() 
    {
        return Excel::download(new MenuExport , 'Menu'. '.xlsx');
    }



    public function importMenu(Request $request) 
    {   

        $restaurant_id = Auth::guard('restaurant')->user()->id;

        $parent_menu_id = Session::get('parent_menu_id'); 

        $message = [
                    'import_menu.required' => 'Please select file to import.',
                    'import_menu.mimes' => 'Only .xls and .xlsx format file allowed.',
                ];

        $request->validate([
            'import_menu' => 'required|mimes:xls,xlsx'
        ],$message);

        

        $array = Excel::toArray(new MenuImport, request()->file('import_menu'));
        $data_file = $array[0];
        if(count($data_file) <= 0){
              return back()->with("error" , "Empty file is not allowed.");
        }


        $my_key_references = ['category_name','image','item_name' , 'item_type' ,'price','description'];
        $file_key_only = array_keys($data_file[0]);
        $array_difference = array_diff($my_key_references, $file_key_only);
        $array_difference = count($array_difference);
        if($array_difference > 0){
            return back()->with("error" , "Coloumn name are not matched.");
        }


        $count_table = Category::count();
        //if($count_table!=0){
            $count_file = count($data_file);
            for($i=0 ; $i < $count_file; $i++){


                    if ($data_file[$i]["image"] == "") {
                        return back()->with("error" , "Please insert image.");
                    }

                    if ($data_file[$i]["image"] != "") {
                        $supported_image = array(
                            'jpg',
                            'jpeg',
                            'png',
                        );
                        $src_file_name = $data_file[$i]["image"];
                        $ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION)); // Using strtolower to overcome case sensitive
                        if (in_array($ext, $supported_image)) {
                            
                        } else {
                            return back()->with("error" , "Please upload jpg, jpeg and png file only.");
                        }
                    }

                    if ($data_file[$i]["image"] != "") {
                        $isExist = MenuImages::where("menu_image" , $data_file[$i]["image"])->where('restaurant_id' , $restaurant_id)->where('deleted_at' , Null)->first();
                        if($isExist){
                            /*if (!file_exists( public_path('storage/category_images/' . $data_file[$i]["image"]) {
                                return back()->with("error" , "Image not exist.");
                            } */
                            File::copy(public_path('storage/restaurant/menu_gallery_images/'.$data_file[$i]["image"]), public_path('storage/restaurant/menu_images/'.$data_file[$i]["image"]));
                        }else if(!$isExist){
                            $main_exist = Menu::where('restaurant_id' , $restaurant_id)->where('deleted_at' , Null)->where("image" , $data_file[$i]["image"])->first();
                            if (!$main_exist) {
                                return back()->with("error" , "Please enter valid image name.");
                            }
                        }
                    }


                    // for($j=$i+1 ; $j<$count_file ; $j++){
                    //     if ($data_file[$i]["name"] == $data_file[$j]["name"] ) {
                    //         return back()->with("error" , "Category name should be unique for all categories.");
                    //     }
                    // }

                    // if(empty(!$data_file[$i]["category_id"])){
                    //     for($j=$i+1 ; $j<$count_file ; $j++){
                    //         if ($data_file[$i]["category_id"] == $data_file[$j]["category_id"] ) {
                    //             return back()->with("error" , "Category ID should be unique for all categories.");
                    //         }
                    //     }
                    // }

                    if(trim($data_file[$i]["category_name"]) == "" ){
                        return back()->with("error" , "Category name field is required.");
                    }
                    $Category_name = array(
                                            'breakfast',
                                            'lunch',
                                            'snacks',
                                            'dinner',
                                            'beverages',
                                        );
                    $file_category_name = strtolower($data_file[$i]["category_name"]);

                    if (!in_array($file_category_name, $Category_name)) {
                        return back()->with("error" , "Please enter valid category name. it should be Breakfast, Lunch, Snacks, Dinner and Beverages.");
                    }
                    





                    if(trim($data_file[$i]["item_name"]) == "" ){
                        return back()->with("error" , "Item name field is required.");
                    }
                    if(strlen($data_file[$i]["item_name"]) > 50 ){
                        return back()->with("error" , "Item name should not be greater than 50 characters.");
                    }
                    if(strlen($data_file[$i]["item_name"]) < 2 ){
                        return back()->with("error" , "Item name should be at least 2 characters long.
");
                    }







                    if(trim($data_file[$i]["item_type"]) == "" ){
                        return back()->with("error" , "Item type field is required.");
                    }
                    $item_type = array(
                                            'non-veg',
                                            'veg',
                                        );

                    $file_item_type = strtolower($data_file[$i]["item_type"]);

                    if (!in_array($file_item_type, $item_type)) {
                        return back()->with("error" , "Please enter valid Item type, it should be Veg or Non-Veg.");
                    }







                    if(trim($data_file[$i]["price"]) == "" ){
                        return back()->with("error" , "Price field is required.");
                    }
                    if($data_file[$i]["price"] <= 0){
                        return back()->with("error" , "Price should be greater than 0.");
                    }
                    if($data_file[$i]["price"] > 10000){
                        return back()->with("error" , "Price should be less than or equal to 10,000.");
                    }





                    if(trim($data_file[$i]["description"]) == "" ){
                        return back()->with("error" , "Description field is required.");
                    }
                    if(strlen($data_file[$i]["description"]) < 2 ){
                        return back()->with("error" , "Description should be at least 2 characters long.");
                    }
                    if(strlen($data_file[$i]["description"]) > 200 ){
                        return back()->with("error" , "Description should be less than or equal to 200 characters.");
                    }
                    // $word_count = array_filter(explode(" ",str_replace("  "," ",$data_file[$i]["description"])));
                    // if (count($word_count) > 100) {
                    //     return back()->with("error" , "Description should not be greater than 100 words.");    
                    // }


              
                }


                    // if (empty($count_table) ) {
                        for($i=0 ; $i < $count_file; $i++){

                            $category_name = strtolower($data_file[$i]["category_name"]);
                            if($category_name == 'breakfast'){
                                $category_id = 1;
                            }
                            if($category_name == 'lunch'){
                                $category_id = 2;
                            }
                            if($category_name == 'snacks'){
                                $category_id = 3;
                            }
                            if($category_name == 'dinner'){
                                $category_id = 4;
                            }
                            if($category_name == 'beverages'){
                                $category_id = 5;
                            }

                            $item_name = ucfirst($data_file[$i]["item_name"]);

                            $insertData = [
                                "parent_menu_id" => $parent_menu_id,
                                "restaurant_id" => $restaurant_id,
                                "category_id"   => $category_id,
                                "category_name" => ucfirst($category_name),
                                "image"         => $data_file[$i]["image"],
                                "item_name"     => $item_name,
                                "item_type"     => $data_file[$i]["item_type"],
                                "price"         => $data_file[$i]["price"],
                                "description"   => $data_file[$i]["description"], 
                            ];
                            Menu::create($insertData);
                        }
                    // }

                // if ($count_table !="") {  
                //     for($i=0 ; $i < $count_file; $i++){
                        
                //             $insertData = [
                //                 "name"    => $data_file[$i]["name"],
                //                 "image"    => $data_file[$i]["image"],
                //                 "status"  => $data_file[$i]["status"],
                //                 "price"   => $data_file[$i]["price"],
                //                 "description" => $data_file[$i]["description"],
                //                 "order_id" => $data_file[$i]["order_id"],
                //             ];

                //            $is_category = Category::where('id', $data_file[$i]["category_id"])->first();

                //                 if ($is_category) {
                //                     $check_name = Category::where('id','!=',$is_category->id)->where("name",$insertData["name"])->first();
                //                     if ($check_name) {
                //                         return back()->with("error" , "Category name is already exist.");
                //                     }else{
                //                         Category::where('id' , $data_file[$i]["category_id"])->update($insertData);
                //                      }
                //                 }
                //                 else{
                //                     $is_category_name = Category::where('name', $data_file[$i]["name"])->first();
                //                     if ($is_category_name) {
                //                         return back()->with("error" , "Category name is already exist.");
                //                     }else{
                //                         Category::create($insertData);
                //                     }
                //                 }


                //     }
                // }
        return redirect(url("restaurant/menu-management").'/'.$parent_menu_id)->with("success","File uploaded successfully.");  
    }

















    public function parentMenuManagement(Request $request){
        $restaurant_id = Auth::guard('restaurant')->user()->id;
        $data = ParentMenuName::where('restaurant_id' , $restaurant_id)->where('deleted_at' , null)->orderBy('id' , 'desc')->with('menu')->get();
        return view('restaurant/parent-menu-management' , compact('data'));
    }


    public function addParentMenuName(Request $request){
        if($request->isMethod('GET')){
            return view('restaurant/parent-menu-name-add');
        }
        if($request->isMethod('POST')){
            $restaurant_id = Auth::guard('restaurant')->user()->id;


            $check_parent_name_already_exist = ParentMenuName::where('restaurant_id' , $restaurant_id)->where('menu_name' , $request->menu_name)->where('deleted_at' , null)->first();

            if($check_parent_name_already_exist){
                return back()->with('error' , 'Menu name is already exist.');
            }

            $data = [
                'restaurant_id' => $restaurant_id,
                'menu_name' => $request->menu_name,
            ];

            $is_created = ParentMenuName::create($data);
            if($is_created){
                return redirect('restaurant/parent-menu-management')->with('success' , 'Menu has been added successfully.');
            }else{
                return back()->with('error')->with('error' , 'Unable to add menu.');
            }
        }
    }


    public function editParentMenuName(Request $request , $id){
        if($request->isMethod('GET')){
            $data = ParentMenuName::where('id' , $id)->first();
            return view('restaurant/parent-menu-name-edit' , compact('data'));
        }
        if($request->isMethod('POST')){
            $restaurant_id = Auth::guard('restaurant')->user()->id;

            $check_parent_name_already_exist = ParentMenuName::where('id' ,'!=' , $id)->where('restaurant_id' , $restaurant_id)->where('menu_name' , $request->menu_name)->where('deleted_at' , null)->first();

            if($check_parent_name_already_exist){
                return back()->with('error' , 'Menu name is already exist.');
            }

            $data = [
                'menu_name' => $request->menu_name,
            ];

            $is_updated = ParentMenuName::where('id' , $id)->update($data);
            if($is_updated){
                return redirect('restaurant/parent-menu-management')->with('success' , 'Menu has been added successfully.');
            }else{
                return back()->with('error')->with('error' , 'Unable to add menu.');
            }
        }
    }


    public function deleteParentMenu(Request $request){
        $parent_menu_id = $request->delete_parent_menu_id;

        $check_menu_assign_to_table = Table::where('assign_menu_id' , $parent_menu_id)->first();
        if($check_menu_assign_to_table){
            return back()->with('error' , 'This menu has been assigned to the entity, so you can not delete this menu.');
        }

        ParentMenuName::whereId($parent_menu_id)->update(['deleted_at' => Carbon::now()]);
        // Menu::where('parent_menu_id' , $parent_menu_id)->update(['deleted_at' => Carbon::now()]);
        Table::where('assign_menu_id' , $parent_menu_id)->update(['assign_menu_id' => null]);

        return redirect(route('restaurant.parentMenuManagement'))->with('success' , 'Menu has been deleted successfully.'); 
    }


    public function deleteAllImages(Request $request){
        $restaurant_id = Auth()->guard('restaurant')->user()->id;
        MenuImages::where('restaurant_id' , $restaurant_id)->delete();
        return back()->with('success' , 'Images has been deleted successfully.');
    }

}
