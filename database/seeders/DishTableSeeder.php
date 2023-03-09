<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin\Dish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DishTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        // questo prende un id casuale tra gli utenti e lo usa per identificare il piatto, è randomico, alcuni utente potrebbero avere più piatti altri nessuno
        $userIds = User::pluck('id');

        for ($i = 0; $i < 10; $i++) {
            $userId = $faker->randomElement($userIds);

            $dish = new Dish;
            $dish->user_id = $userId;
            $dish->nome = $faker->sentence(2);
            $dish->tot_calorie = $faker->randomFloat(2, 0, 1000);
            $dish->tot_carboidrati = $faker->randomFloat(2, 0, 100);
            $dish->tot_carboidrati_di_cui_zuccheri = $faker->randomFloat(2, 0, 100);
            $dish->tot_grassi = $faker->randomFloat(2, 0, 100);
            $dish->tot_grassi_di_cui_saturi = $faker->randomFloat(2, 0, 100);
            $dish->tot_fibre = $faker->randomFloat(2, 0, 100);
            $dish->tot_proteine = $faker->randomFloat(2, 0, 100);
            $dish->tot_sali = $faker->randomFloat(2, 0, 100);
            $dish->category = $faker->randomElement(['Colazione', 'pranzo', 'cena', 'merenda']);

            $dish->save();
        }
    }
}
