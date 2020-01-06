<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClotheByUser extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //atributos de asignación masiva 
    protected $fillable = [
        'name',
        'description',
        'price',
        'state',
        'category_id',
        'user_id',
        'clothing_size_id',
        'clothing_brand_id'
    ];

}
