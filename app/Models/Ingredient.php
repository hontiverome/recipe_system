<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = ['recipe_id', 'name', 'quantity', 'unit', 'notes'];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
