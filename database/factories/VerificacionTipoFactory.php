<?php

namespace Database\Factories;

use App\Models\VerificacionTipo;
use Illuminate\Database\Eloquent\Factories\Factory;

class VerificacionTipoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VerificacionTipo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'created_at'=>$this->faker->dateTimeBetween(),
        ];
    }
}
