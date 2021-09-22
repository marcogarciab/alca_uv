<?php

namespace Database\Factories;

use App\Models\SolicitudPropuesta;
use App\Models\Empresa;
use App\Models\Norma;
use App\Models\VerificacionTipo;
use Illuminate\Database\Eloquent\Factories\Factory;

class SolicitudPropuestaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SolicitudPropuesta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'numero' => $this->faker->randomNumber(),
            'empresa_id' => Empresa::all()->random()->id,
            'norma_id' => Norma::all()->random()->id,
            'verificacion_tipo_id' => VerificacionTipo::all()->random()->id,
            'path' => $this->faker->mimeType(),
            'created_at' => $this->faker->dateTimeBetween(date_create('2015-01-01'),now()),
            
        ];
    }
}
