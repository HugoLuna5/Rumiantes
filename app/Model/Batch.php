<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    //
    protected $table = 'batches';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number', 'description'
    ];
}
