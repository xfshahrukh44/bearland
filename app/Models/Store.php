<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'stores';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['category', 'name', 'slug', 'type', 'price', 'sku', 'length', 'height', 'width', 'image', 'color','detail','unit_of_measure','sub_category'];


}
