<?php

namespace App\Models;

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
        return $this->hasMany('App\Models\Step');
    }

    public function ingredients()
    {
        return $this->belongsToMany('App\Models\Ingredient')
                    ->withPivot('quantity', 'unit', 'notes')
                    ->using('App\Models\RecipeIngredient');
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
