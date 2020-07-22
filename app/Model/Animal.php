<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    //

    protected $table = 'animals';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_animal', 'race_id', 'purpose_id', 'livestock_id', 'batche_id',
        'birthday', 'gender', 'name'
    ];
}
