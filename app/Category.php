<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categries'; 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cat_name'
    ];

}
    
