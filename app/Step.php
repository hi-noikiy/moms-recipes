<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    protected $fillable = ['body'];

    public function recipe() {
        return $this->belongsTo('App\Recipe');
    }
}
