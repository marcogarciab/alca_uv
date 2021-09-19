<?php

namespace Database\Seeders;

use App\Models\Acta;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\Evidencia;
use App\Models\EvidenciaTipo;
use App\Models\Norma;
use App\Models\Orden;
use App\Models\Propuesta;
use App\Models\SolicitudPropuesta;
use App\Models\VerificacionTipo;
use App\Models\Verificador;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(40)->create();
        Cliente::factory(30)->create();
        Empresa::factory(70)->create();
        Norma::factory(2)->create();
        VerificacionTipo::factory(2)->create();
        SolicitudPropuesta::factory(1000)->create();
        Verificador::factory(10)->create();
        Propuesta::factory(1000)->create();
        Orden::factory(500)->create();
        Acta::factory(500)->create();
        EvidenciaTipo::factory(40)->create();
        Evidencia::factory(1500)->create();
        Acta::factory(500);

    }
}
