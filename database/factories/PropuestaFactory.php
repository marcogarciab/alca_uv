<?php

namespace Database\Factories;

use App\Models\Propuesta;
use App\Models\SolicitudPropuesta;
use App\Models\Verificador;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropuestaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Propuesta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'numero_control' => $this->faker->creditCardNumber(),
            'costo' => $this->faker->numberBetween(),
            'es_aceptada' => $this->faker->boolean(),
            'fecha_aceptacion' => $this->faker->dateTimeBetween(date_create('2020-01-01'),now()),
            'solicitud_propuesta_id' => SolicitudPropuesta::all()->random()->id,
            'verificadore_id' => Verificador::all()->random()->id,
            'path' => $this->faker->mimeType(),
            'created_at'=>$this->faker->dateTimeBetween(),
        ];
    }
}
