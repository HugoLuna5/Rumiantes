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
        'birthday', 'gender', 'name', 'father_id', 'mother_id'
    ];

    public function liveStock(){
        return $this->hasOne('App\Model\Livestock', 'id', 'livestock_id');
    }

    public function batch(){
        return $this->hasOne('App\Model\Batch', 'id', 'batche_id');
    }

    public function race(){
        return $this->hasOne('App\Model\Race', 'id', 'race_id');
    }

    public function purpose(){
        return $this->hasOne('App\Model\Purpose', 'id', 'purpose_id');
    }

    public function father(){
        return $this->hasOne('App\Model\Animal', 'no_animal','father_id');
    }
    public function mother(){
        return $this->hasOne('App\Model\Animal', 'no_animal','mother_id');
    }

}
