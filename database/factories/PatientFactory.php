<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('pt_BR');
        return [
            "Photo" => '/photo/rFwedXN2hWo8vATUgPkiUhtfzH9OPBQl2OuXFZx4.png',
            "Name" => $faker->name,
            "motherName" => $faker->name,
            "BirthDay" => $faker->date,
            "CPF" => $faker->cpf,
            "CNS" => $faker->rg
        ];
    }
}
