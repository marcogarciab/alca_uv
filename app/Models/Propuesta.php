<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property string  $numero_control
 * @property string  $path
 * @property boolean $es_aceptada
 * @property Date    $fecha_aceptacion
 * @property int     $verificadore_id
 * @property int     $created_at
 * @property int     $updated_at
 * @property int     $deleted_at
 */
class Propuesta extends Model
{
    use HasFactory;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'propuestas';

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
        'numero_control', 'costo', 'es_aceptada', 'fecha_aceptacion', 'solicitud_propuesta_id', 'verificadore_id', 'path', 'created_at', 'updated_at', 'deleted_at'
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
        'numero_control' => 'string', 'es_aceptada' => 'boolean', 'fecha_aceptacion' => 'date', 'verificadore_id' => 'int', 'path' => 'string', 'created_at' => 'date', 'updated_at' => 'date', 'deleted_at' => 'date'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'fecha_aceptacion', 'created_at', 'updated_at', 'deleted_at'
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
