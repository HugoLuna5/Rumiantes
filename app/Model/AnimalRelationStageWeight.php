<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AnimalRelationStageWeight extends Model
{
    protected $table = 'animal_relation_stage_weights';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'animal_no', 'stage_id', 'weight_id', 'diet_id', 'weight_to_gain_id', 'date_gain_weight'
    ];

    public function weight(){
        return $this->hasOne('App\Model\Weight', 'id', 'weight_id');
    }

    public function weight_to_gain(){
        return $this->hasOne('App\Model\Weight', 'id', 'weight_to_gain_id');
    }

    public function diet(){
        return $this->hasOne('App\Model\Diet', 'id', 'diet_id');
    }

    public function stage(){
        return $this->hasOne('App\Model\Stage', 'id', 'stage_id');
    }

}
