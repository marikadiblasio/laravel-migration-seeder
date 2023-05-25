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
        for($i = 0; $i < 100; $i++){
            $newTrain = new Train();
            $newTrain->company = $faker->randomElement(['Italo', 'Trenitalia', 'Trenord']);
            $newTrain->departure_station= $faker->randomElement(['Milano', 'Bologna', 'Firenze', 'Torino', 'Napoli', 'Salerno', 'Genova', 'Roma', 'Pisa', 'Venezia']);
            $newTrain->arrival_station= $faker->randomElement(['Lucca', 'Foggia', 'Ancona', 'San Gliuliano Terme', 'Ferrara', 'Brescia', 'Aosta', 'Latina', 'Pordenode', 'Vicenza']);
            $newTrain->departure_time= $faker->dateTimeBetween('-1 week', '+1 week');
            $newTrain->arrival_time= $faker->dateTimeInInterval( $newTrain->departure_time, '+5 hours');
            $newTrain->train_code=$faker->numerify('######');
            $newTrain->carriage_num=$faker->numberBetween(1, 10);
            $newTrain->onTime= $faker->boolean();
            $newTrain->cancelled= $faker->boolean();
            $newTrain->save();
        }
    }
}
