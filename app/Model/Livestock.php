<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Livestock extends Model
{

    protected $table = 'livestocks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
}
