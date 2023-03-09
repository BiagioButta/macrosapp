<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Admin\Ingredient;

class Dish extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class)->withPivot('quantity');
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($dish) {
            $dish->tot_calorie = $dish->ingredients->sum(function ($ingredient) {
                return $ingredient->calorie * $ingredient->pivot->quantity;
            });
        });
    }
}
