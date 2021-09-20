<?php

namespace Database\Factories;

use App\Models\Orden;
use App\Models\Propuesta;
use App\Models\Verificador;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrdenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Orden::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'codigo_servicio' => $this->faker->creditCardNumber(),
            'fecha_verificacion' => $this->faker->dateTimeBetween('-1 year', '-10 days'),
            'propuesta_id' => Propuesta::all()->random()->id,
            'verificadore_id' => Verificador::all()->random()->id,
            'path' => $this->faker->mimeType(),
            'created_at'=>$this->faker->dateTimeBetween('-1 year', '-10 days'),
        ];
    }
}
