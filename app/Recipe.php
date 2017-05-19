<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;

class Recipe extends Model
{
    public function path() {
        return '/recipes/' . $this->id;
    }

    public function owner() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function steps() {
        return $this->hasMany('App\Step');
    }

    public function ingredients() {
        return $this->belongsToMany('App\Ingredient')->withPivot('quantity', 'unit', 'notes');
    }

    public function addIngredient($ingredient, $quantity, $unit, $notes) {
        $this->ingredients()->attach($ingredient->id, compact('quantity', 'unit', 'notes'));

    }
}
