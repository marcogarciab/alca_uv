<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Cliente;
use App\Models\SolicitudPropuesta;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * @property string $razonSocial
 * @property string $nombreComercial
 * @property string $rfc
 * @property string $curp
 * @property string $calle
 * @property string $colonia
 * @property string $estado
 * @property string $ciudad_municipio
 * @property string $entre_calles
 * @property string $referencias
 * @property string $observaciones
 * @property string $nombre_representante
 * @property string $apellidos_representante
 * @property string $telefono
 * @property string $email
 * @property int    $cliente_id
 * @property int    $created_at
 * @property int    $updated_at
 */
class Empresa extends Model
{
    use HasFactory;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'empresas';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'razon_social', 'nombre_comercial', 'rfc', 'curp', 'calle', 'num_int', 'num_ext', 'codigo_postal', 'colonia', 'estado', 'ciudad_municipio', 'entre_calles', 'referencias', 'observaciones', 'nombre_representante', 'apellidos_representante', 'telefono', 'email', 'cliente_id', 'created_at', 'updated_at'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'razonSocial' => 'string', 'nombreComercial' => 'string', 'rfc' => 'string', 'curp' => 'string', 'calle' => 'string', 'colonia' => 'string', 'estado' => 'string', 'ciudad_municipio' => 'string', 'entre_calles' => 'string', 'referencias' => 'string', 'observaciones' => 'string', 'nombre_representante' => 'string', 'apellidos_representante' => 'string', 'telefono' => 'string', 'email' => 'string', 'created_at' => 'date', 'updated_at' => 'date'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = true;

    // Scopes...

    // Functions ...

    public function clientes()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function solicitud_propuestas()
    {
        return $this->belongsTo(SolicitudPropuesta::class);
    }


    // Relations ...
}
