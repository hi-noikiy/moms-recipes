<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    protected $fillable = ['body'];

    public function recipe()
    {
        return $this->belongsTo('App\Models\Recipe');
    }
}
