<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Train;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++){
            $newTrain = new Train();
            $newTrain->company = $faker->randomElement(['Italo', 'Trenitalia', 'Trenord']);
            $newTrain->departure_station= $faker->randomElement(['Milano', 'Bologna', 'Firenze', 'Torino', 'Napoli', 'Salerno', 'Genova', 'Roma', 'Pisa', 'Venezia']);
            $newTrain->arrival_station= $faker->randomElement(['Milano', 'Bologna', 'Ancona', 'Torino', 'Napoli', 'Brescia', 'Genova', 'Roma', 'Pisa', 'Venezia']);
            $newTrain->departure_time= $faker->time();
            $newTrain->arrival_time= $faker->time();
            $newTrain->train_code=$faker->numerify('######');
            $newTrain->carriage_num=$faker->numberBetween(0, 10);
            $newTrain->onTime= $faker->boolean();
            $newTrain->cancelled= $faker->boolean();
            $newTrain->save();
        }
    }
}
