<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OauthAccessToken extends Model
{
    
    /**
     * Eloqunt Relations
     */

    public function refreshToken()
    {
        return $this->hasOne('\App\OauthRefreshToken', 'access_token_idl', 'id');
    }
}
