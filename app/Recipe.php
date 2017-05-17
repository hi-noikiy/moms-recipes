<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public function path() {
        return '/recipes/' . $this->id;
    }

    public function owner() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ingredients() {
        return $this->belongsToMany('App\Ingredient')->withPivot('quantity', 'unit', 'notes');
    }
}
