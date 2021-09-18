<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Empresa;
use App\Models\Norma;
use App\Models\VerificacionTipo;


/**
 * @property int    $numero
 * @property int    $norma_id
 * @property int    $verificacion_tipo_id
 * @property int    $created_at
 * @property int    $updated_at
 * @property int    $deleted_at
 * @property string $path
 */
class SolicitudPropuesta extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'solicitud_propuestas';
    use SoftDeletes;
 

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
        'numero', 'empresa_id', 'norma_id', 'verificacion_tipo_id', 'path', 'created_at', 'updated_at', 'deleted_at'
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
        'numero' => 'int', 'path' => 'string', 'created_at' => 'date', 'updated_at' => 'date', 'deleted_at' => 'date',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = true;

    // Scopes...

    // Functions ...


    public function empresa()
    {
        return $this->hasOne(Empresa::class);
    }

    public function norma()
    {
        return $this->hasOne(Norma::class);
    }

    public function verificacion_tipo()
    {
        return $this->hasOne(VerificacionTipo::class);
    }

    // Relations ...
}
