<?php

namespace Database\Factories;

use App\Models\Norma;
use Illuminate\Database\Eloquent\Factories\Factory;

class NormaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Norma::class;

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
