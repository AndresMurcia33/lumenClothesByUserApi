<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClothingSize extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //atributos de asignación masiva 
    protected $fillable = [
        'name',
        'state',
    ];

}
