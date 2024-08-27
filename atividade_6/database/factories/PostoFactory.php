<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Posto>
 */
class PostoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nome" => fake() -> company(),
            "cnpj" => fake() -> cnpj(),
            "endereco" => fake() -> streetAddress(),
            "cep" => fake() -> cellphone(),
            "cidade" => fake() -> city(),
            "cordX" => fake() -> latitude($min = -90, $max = 90),
            "cordY" => fake() -> longitude($min = -180, $max = 180)
        ];
    }
}
