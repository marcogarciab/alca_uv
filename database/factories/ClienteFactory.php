<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Date;

class ClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'numero' => $this->faker->numberBetween(1000,10000),
            'nombre' => $this->faker->name(),
            'apellido_paterno' => $this->faker->lastName(),
            'apellido_materno' => $this->faker->lastName(),
            'telefono' => $this->faker->phoneNumber(),
            'fecha_nacimiento' => $this->faker->dateTimeBetween(),
            'observaciones' => $this->faker->text(),
            'created_at' => $this->faker->dateTimeBetween('-1 year', '-10 days'),
            'user_id' => User::all()->unique()->random()->id,
        ];
    }
    
}
