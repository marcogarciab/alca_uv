<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property string $codigo_servicio
 * @property string $path
 * @property Date   $fecha_verificacion
 * @property int    $verificadore_id
 * @property int    $created_at
 * @property int    $updated_at
 * @property int    $deleted_at
 */
class Orden extends Model
{
    use HasFactory;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ordenes';

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
        'codigo_servicio', 'fecha_verificacion', 'propuesta_id', 'verificadore_id', 'path', 'created_at', 'updated_at', 'deleted_at'
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
        'codigo_servicio' => 'string', 'fecha_verificacion' => 'date', 'verificadore_id' => 'int', 'path' => 'string', 'created_at' => 'date', 'updated_at' => 'date', 'deleted_at' => 'date'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'fecha_verificacion', 'created_at', 'updated_at', 'deleted_at'
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
