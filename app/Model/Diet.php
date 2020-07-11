<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Diet extends Model
{
    //
    protected $table = 'diets';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'ration_kg', 'protein_requirement'
    ];
}
