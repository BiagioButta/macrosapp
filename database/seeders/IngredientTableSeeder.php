<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin\Ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class IngredientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        // stessa funzione che ha in disheseeder
        $userIds = User::pluck('id');

        // Crea 10 ingredienti casuali associati a utenti esistenti nella tabella 'users'
        for ($i = 0; $i < 10; $i++) {
            $ingredient = new Ingredient;
            $ingredient->user_id = $faker->randomElement($userIds);
            $ingredient->nome = $faker->word;
            $ingredient->description = $faker->sentence;
            $ingredient->calorie = $faker->randomFloat(2, 10, 500);
            $ingredient->carboidrati = $faker->randomFloat(2, 1, 100);
            $ingredient->carboidrati_di_cui_zuccheri = $faker->randomFloat(2, 0, 50);
            $ingredient->grassi = $faker->randomFloat(2, 1, 100);
            $ingredient->grassi_di_cui_saturi = $faker->randomFloat(2, 0, 50);
            $ingredient->fibre = $faker->randomFloat(2, 0, 50);
            $ingredient->proteine = $faker->randomFloat(2, 1, 100);
            $ingredient->sali = $faker->randomFloat(2, 0, 50);

            $ingredient->save();
        }
    }
}
