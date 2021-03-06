<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    protected $table = 'races';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
}
