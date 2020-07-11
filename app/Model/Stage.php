<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $table = 'stages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
}
