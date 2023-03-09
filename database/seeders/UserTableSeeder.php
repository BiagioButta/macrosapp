<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Factory;
use Faker\Generator as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i =0; $i < 3; $i++) {
            $user = new User;
            $user->name = $faker->firstName();
            $user->surname = $faker->lastName();
            $user->nickname = $faker->userName();
            $user->email = $faker->email();
            $user->password = '11111111';
            $user->gender = $faker->randomElement(['male', 'female']);
            $user->date_of_birth = $faker->date();
            $user->height = $faker->optional()->randomFloat(2, 150, 200);
            $user->weight = $faker->optional()->randomFloat(2, 50, 150);
            $user->private_token = $faker->optional()->uuid();

            $user->save();
        }
    }
}
