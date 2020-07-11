<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Purpose extends Model
{
    protected $table = 'purposes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'purpose'
    ];
}
