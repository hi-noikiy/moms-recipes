<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class RecipeIngredient extends Pivot
{
    protected $table = 'ingredient_recipe';
}
