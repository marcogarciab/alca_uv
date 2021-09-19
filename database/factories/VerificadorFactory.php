<?php

namespace Database\Factories;

use App\Models\Verificador;
use Illuminate\Database\Eloquent\Factories\Factory;

class VerificadorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Verificador::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'apellido_paterno' => $this->faker->lastName(),
            'apellido_materno' => $this->faker->lastName(),
            'serial_certificacion' => $this->faker->creditCardNumber(),
            'created_at'=>$this->faker->dateTimeBetween(),
        ];
    }
}
