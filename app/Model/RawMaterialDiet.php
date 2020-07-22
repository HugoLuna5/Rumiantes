<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RawMaterialDiet extends Model
{
    protected $table = 'raw_material_diets';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'raw_material_id', 'diet_id'
    ];


    public function rawmaterial(){

        return $this->hasOne('App\Model\RawMaterial', 'id', 'raw_material_id');

    }

}
