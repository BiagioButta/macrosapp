<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Dish;
use App\Models\User;

class Ingredient extends Model
{
    use HasFactory;

    public function dishes()
    {
        return $this->belongsToMany(Dish::class)->withPivot('quantity');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

