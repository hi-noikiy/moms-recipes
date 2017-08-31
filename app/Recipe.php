<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public function path()
    {
        return '/recipes/' . $this->id;
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function steps()
    {
        return $this->hasMany('App\Step');
    }

    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient')
                    ->withPivot('quantity', 'unit', 'notes')
                    ->using('App\RecipeIngredient');
    }

    public function addIngredient($ingredient, $quantity, $unit, $notes)
    {
        $this->ingredients()->attach($ingredient->id, compact('quantity', 'unit', 'notes'));
    }

    public function addStep($body)
    {
        $this->steps()->create(compact('body'));
    }
}
