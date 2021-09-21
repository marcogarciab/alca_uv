<?php

namespace Database\Seeders;

use App\Models\Acta;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Dictamen;
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
        User::factory(30)->create();
        Cliente::factory(20)->create();
        Empresa::factory(30)->create();
        Norma::factory(2)->create();
        VerificacionTipo::factory(2)->create();
        SolicitudPropuesta::factory(100)->create();
        Verificador::factory(10)->create();
        Propuesta::factory(100)->create();
        Orden::factory(98)->create();
        Acta::factory(98)->create();
        EvidenciaTipo::factory(30)->create();
        Evidencia::factory(300)->create();
        Acta::factory(98)->create();
        Dictamen::factory(98)->create();
    }
}
