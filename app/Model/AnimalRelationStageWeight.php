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
}
