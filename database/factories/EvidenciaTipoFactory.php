<?php

namespace Database\Factories;

use App\Models\EvidenciaTipo;
use App\Models\Norma;
use App\Models\VerificacionTipo;
use Illuminate\Database\Eloquent\Factories\Factory;

class EvidenciaTipoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EvidenciaTipo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'nombre' => $this->faker->name(),
            'descripcion' => $this->faker->text(),
            'norma_id' => Norma::all()->random()->id,
            'verificacion_tipo_id' => VerificacionTipo::all()->random()->id,
            'created_at'=>$this->faker->dateTimeBetween('-1 year', '-10 days'),
        ];
    }
}
