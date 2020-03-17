<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uID' , 'firstName' , 'middleName' , 'lastName' , 'emailID' , 'password_temp' , 'create_Time' , 'catID' , 'depID' , 'locID' , 
        'status' , 'isEmailVerified' , 'activatedDateTime' , 'deactivatedDateTime' , 'updateDateTime' , 'catName' , 'department_name' , 
        'location_name' , 'designation_name' , 'reportingUserID' , 'roleId' , 'password_temp'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'activatedDateTime' => 'datetime',
    ];

    /**
     * table name.
     *
     * @var array
     */
    protected $table = 'master_users';

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
    
