<?php

namespace Database\Factories;

use App\Models\Acta;
use App\Models\Dictamen;
use Illuminate\Database\Eloquent\Factories\Factory;

class DictamenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dictamen::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'acta_id ' => Acta::all()->random()->id,
            'es_aprobado' => $this->faker->boolean(),
            'path' => $this->faker->mimeType(),
            'created_at'=>$this->faker->dateTimeBetween(date_create('2020-01-01'),now()),
        ];
    }
}
