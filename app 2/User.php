<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\ClassManagement;
use App\Models\Task;
use App\Models\SubTask;
class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 
        'last_name', 
        'email', 
        'image', 
        'device_type', 
        'device_token', 
        'refresh_token', 
        'password', 
        'verify_email_token', 
        'is_block', 
        'is_verify'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token', 'refresh_token', 'verify_email_token'

    ];

    public function accessToken()
    {
        return $this->hasMany('\App\OauthAccessToken')
            ->where('revoked', 1);
    }

    public function refreshToken(){
        return $this->hasMany('\App\OauthRefreshToken')
            ->where('revoked', 1);
    }

    //Muatators

    public function getImageAttribute($value){

        if(!empty($value)){

            $path_img = public_path(). '/storage/users' . '/' . $value;

            if(file_exists($path_img)){
                return url('/') . '/' . env('IMG_STORAGE_VIEW') . '/' . $value;
            }else{

                return "";
            } 
        }else{
            return $value;
        }
    }
}

