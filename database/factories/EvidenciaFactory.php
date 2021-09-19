<?php

namespace Database\Factories;

use App\Models\Acta;
use App\Models\Evidencia;
use App\Models\EvidenciaTipo;
use Illuminate\Database\Eloquent\Factories\Factory;

class EvidenciaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Evidencia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'path' => $this->faker->mimeType(),
            'evidencia_tipo_id' => EvidenciaTipo::all()->random()->id,
            'acta_id' => Acta::all()->random()->id,
            'created_at'=>$this->faker->dateTimeBetween(),
        ];
    }
}
