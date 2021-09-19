<?php

namespace Database\Factories;

use App\Models\Acta;
use App\Models\Orden;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Acta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'alcance_verificacion' => $this->faker->name(),
            'hechos_verificacion' => $this->faker->name(),
            'es_modifica_alcance' => $this->faker->boolean(),
            'es_no_conformidad' => $this->faker->boolean(),
            'descripcion_no_conformidad' => $this->faker->name(),
            'descripcion_accion_correctiva' => $this->faker->name(),
            'fecha_fin' => $this->faker->dateTimeBetween(date_create('2020-01-01'),now()),
            'path' => $this->faker->mimeType(),
            'ordene_id' => Orden::all()->random()->id,
            'created_at' => $this->faker->dateTimeInInterval(),
            
        ];
    }
}
