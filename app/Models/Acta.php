<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property string   $alcance_verificacion
 * @property string   $hechos_verificacion
 * @property string   $descripcion_no_conformidad
 * @property string   $descripcion_accion_correctiva
 * @property string   $observaciones_protesta
 * @property string   $observaciones_representante
 * @property string   $path
 * @property boolean  $es_modifica_alcance
 * @property boolean  $es_no_conformidad
 * @property DateTime $fecha_fin
 * @property int      $created_at
 * @property int      $updated_at
 * @property int      $deleted_at
 */
class Acta extends Model
{
    use HasFactory;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'actas';

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
        'alcance_verificacion', 'numero','hechos_verificacion', 'es_modifica_alcance', 'es_no_conformidad', 'descripcion_no_conformidad', 'descripcion_accion_correctiva', 'observaciones_protesta', 'observaciones_representante', 'fecha_fin', 'path', 'ordene_id', 'created_at', 'updated_at', 'deleted_at'
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
        'alcance_verificacion' => 'string', 'numero' => 'string','hechos_verificacion' => 'string', 'es_modifica_alcance' => 'boolean', 'es_no_conformidad' => 'boolean', 'descripcion_no_conformidad' => 'string', 'descripcion_accion_correctiva' => 'string', 'observaciones_protesta' => 'string', 'observaciones_representante' => 'string', 'fecha_fin' => 'datetime', 'path' => 'string', 'created_at' => 'date', 'updated_at' => 'date', 'deleted_at' => 'date'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'fecha_fin', 'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = true;

    // Scopes...

    // Functions ...

    // Relations ...
}
