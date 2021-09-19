<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpresaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Empresa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'razon_social' => $this->faker->company(),
            'nombre_comercial' => $this->faker->companySuffix(),
            'rfc' => $this->faker->regexify('^[A-Z]{4}([0-9]{2})(1[0-2]|0[1-9])([0-3][0-9])([ -]?)([A-Z0-9]{4})$'),
            'curp' => $this->faker->regexify('^[A-Z]{4}([0-9]{2})(1[0-2]|0[1-9])([0-3][0-9])([ -]?)([A-Z0-9]{4})$'),
            'calle' => $this->faker->address(),
            'num_int' => $this->faker->randomNumber(),
            'num_ext' => $this->faker->randomNumber(),
            'codigo_postal' => $this->faker->postcode(),
            'colonia' => $this->faker->streetName(),
            'estado' => $this->faker->state(),
            'ciudad_municipio' => $this->faker->city(),
            'entre_calles' => $this->faker->citySuffix(),
            'referencias' => $this->faker->streetSuffix(),
            'observaciones' => $this->faker->text(),
            'nombre_representante' => $this->faker->name(),
            'apellidos_representante' => $this->faker->lastName(),
            'telefono' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'cliente_id' => Cliente::all()->random()->id,
            'created_at'=>$this->faker->dateTimeBetween(),
        
        ];
    }
}
