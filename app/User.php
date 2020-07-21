<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at', 'is_verified','firstName', 'middleName', 'lastName', 'email', 'password', 'created_at', 'catID', 'depID', 'locID', 'status', 'isEmailVerified', 'activatedDateTime', 'deactivatedDateTime', 'updated_at', 'catName', 'department_name', 'location_name', 'designation_name', 'reportingUserID', 'roleId'
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
     * table name.
     *
     * @var array
     */

    protected $table = 'users';
}

