<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    public function definition(): array
    {
        $faker = \Faker\Factory::create('pt_BR');
        return [
            "CEP" => '13180330',
            "Address" => $faker->streetName,
            "Number" => $faker->buildingNumber,
            "Complement" => 'Casa',
            "Neighborhood" => $faker->name,
            "City" => $faker->city,
            "State" => $faker->stateAbbr,
        ];
    }
}
