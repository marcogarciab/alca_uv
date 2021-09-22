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
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

    $roleAdmin = Role::create(['name' => 'Administrador']);
    $roleCliente = Role::create(['name' => 'Cliente']);

    Permission::create(['name'=>'users.edit', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'users.index', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'users.show', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'users.create', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'users.delete', 'description' => 'Es un PErmiso Prueba Normas'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'permisos.edit', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'permisos.index', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'permisos.show', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'permisos.create', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'permisos.delete', 'description' => 'Es un PErmiso Prueba Normas'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'roles.edit', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'roles.index', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'roles.show', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'roles.create', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'roles.delete', 'description' => 'Es un PErmiso Prueba Normas'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'clientes.edit', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'clientes.index', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'clientes.show', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'clientes.create', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'clientes.delete', 'description' => 'Es un PErmiso Prueba Normas'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'empresas.edit', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin, $roleCliente]);
    Permission::create(['name'=>'empresas.index', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin, $roleCliente]);
    Permission::create(['name'=>'empresas.show', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin, $roleCliente]);
    Permission::create(['name'=>'empresas.create', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin, $roleCliente]);
    Permission::create(['name'=>'empresas.delete', 'description' => 'Es un PErmiso Prueba Normas'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'normas.edit', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'normas.index', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'normas.show', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'normas.create', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'normas.delete', 'description' => 'Es un PErmiso Prueba Normas'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'verificacion_tipos.edit', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'verificacion_tipos.index', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'verificacion_tipos.show', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'verificacion_tipos.create', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'verificacion_tipos.delete', 'description' => 'Es un PErmiso Prueba Normas'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'solicitud_propuestas.edit', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin,$roleCliente]);
    Permission::create(['name'=>'solicitud_propuestas.index', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin, $roleCliente]);
    Permission::create(['name'=>'solicitud_propuestas.show', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin, $roleCliente]);
    Permission::create(['name'=>'solicitud_propuestas.create', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin, $roleCliente]);
    Permission::create(['name'=>'solicitud_propuestas.delete', 'description' => 'Es un PErmiso Prueba Normas'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'verificadores.edit', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'verificadores.index', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'verificadores.show', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'verificadores.create', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'verificadores.delete', 'description' => 'Es un PErmiso Prueba Normas'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'propuestas.edit', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin, $roleCliente]);
    Permission::create(['name'=>'propuestas.index', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin, $roleCliente]);
    Permission::create(['name'=>'propuestas.show', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin, $roleCliente]);
    Permission::create(['name'=>'propuestas.create', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'propuestas.delete', 'description' => 'Es un PErmiso Prueba Normas'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'ordenes.edit', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'ordenes.index', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin, $roleCliente]);
    Permission::create(['name'=>'ordenes.show', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin, $roleCliente]);
    Permission::create(['name'=>'ordenes.create', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'ordenes.delete', 'description' => 'Es un PErmiso Prueba Normas'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'actas.edit', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'actas.index', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin, $roleCliente]);
    Permission::create(['name'=>'actas.show', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin, $roleCliente]);
    Permission::create(['name'=>'actas.create', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'actas.delete', 'description' => 'Es un PErmiso Prueba Normas'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'evidencias.edit', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin, $roleCliente]);
    Permission::create(['name'=>'evidencias.index', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin, $roleCliente]);
    Permission::create(['name'=>'evidencias.show', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin, $roleCliente]);
    Permission::create(['name'=>'evidencias.create', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin, $roleCliente]);
    Permission::create(['name'=>'evidencias.delete', 'description' => 'Es un PErmiso Prueba Normas'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'dictamenes.edit', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'dictamenes.index', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin, $roleCliente]);
    Permission::create(['name'=>'dictamenes.show', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin, $roleCliente]);
    Permission::create(['name'=>'dictamenes.create', 'description' => 'Es un PErmiso Prueba'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'dictamenes.delete', 'description' => 'Es un PErmiso Prueba Normas'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'grafica_solicitud_propuestas', 'description' => 'Es un PErmiso Prueba Normas'])->syncRoles([$roleAdmin]);
    Permission::create(['name'=>'cliente.save', 'description' => 'Es un PErmiso Prueba Normas'])->syncRoles([$roleCliente]);

    


    User::create(['name'=>'Marco Antonio', 'email' => 'marco@marco.com', 'password' => bcrypt('123456789')])->syncRoles([$roleAdmin]);


        User::factory(30)->create();
        Cliente::factory(20)->create();
        Empresa::factory(30)->create();
        Norma::factory(2)->create();
        VerificacionTipo::factory(2)->create();
        SolicitudPropuesta::factory(500)->create();
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
