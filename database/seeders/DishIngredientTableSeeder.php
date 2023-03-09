<?php

namespace Database\Seeders;

use App\Models\Admin\Dish;
use App\Models\Admin\Ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DishIngredientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        // Creare 10 piatti con ingredienti casuali
        for ($i = 0; $i < 10; $i++) {
            $dish = new Dish;
            $dish->user_id = $faker->randomElement([1, 2, 3]);
            $dish->nome = $faker->sentence(2);
            $dish->tot_calorie = $faker->randomFloat(2, 100, 1000);
            $dish->tot_carboidrati = $faker->randomFloat(2, 10, 100);
            $dish->tot_carboidrati_di_cui_zuccheri = $faker->randomFloat(2, 0, 50);
            $dish->tot_grassi = $faker->randomFloat(2, 5, 50);
            $dish->tot_grassi_di_cui_saturi = $faker->randomFloat(2, 0, 20);
            $dish->tot_fibre = $faker->randomFloat(2, 0, 20);
            $dish->tot_proteine = $faker->randomFloat(2, 5, 50);
            $dish->tot_sali = $faker->randomFloat(2, 0, 10);
            $dish->category = $faker->randomElement(['Colazione', 'pranzo', 'cena', 'merenda']);
            $dish->save();


            // per ogni piatto vengono creati 5 ingredienti che lo formeranno
            $numIngredients = $faker->numberBetween(1, 5);
            $ingredients = [];
            for ($j = 0; $j < $numIngredients; $j++) {
                $ingredient = new Ingredient;
                $ingredient->user_id = $faker->randomElement([1, 2, 3]);
                $ingredient->nome = $faker->word;
                $ingredient->description = $faker->sentence(6);
                $ingredient->calorie = $faker->randomFloat(2, 10, 500);
                $ingredient->carboidrati = $faker->randomFloat(2, 0, 50);
                $ingredient->carboidrati_di_cui_zuccheri = $faker->randomFloat(2, 0, 50);
                $ingredient->grassi = $faker->randomFloat(2, 0, 50);
                $ingredient->grassi_di_cui_saturi = $faker->randomFloat(2, 0, 20);
                $ingredient->fibre = $faker->randomFloat(2, 0, 20);
                $ingredient->proteine = $faker->randomFloat(2, 0, 50);
                $ingredient->sali = $faker->randomFloat(2, 0, 5);
                $ingredient->save();


                // viene generata una quantità per ogni ingrediente
                $quantity = $faker->randomFloat(2, 0.1, 1.0);
                $ingredients[$ingredient->id] = ['quantity' => $quantity];
            }

            $dish->ingredients()->attach($ingredients);
        }
    }
}
