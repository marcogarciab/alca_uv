<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\SolicitudPropuesta;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property string $nombre
 * @property int    $created_at
 * @property int    $updated_at
 * @property int    $deleted_at
 */
class Norma extends Model
{
    use HasFactory;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'normas';
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
        'nombre', 'created_at', 'updated_at', 'deleted_at', 'descripcion'
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
        'nombre' => 'string', 'created_at' => 'date', 'updated_at' => 'date', 'deleted_at' => 'date', 'descripcion' => 'string',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
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

    public function solicitud_propuestas()
    {
        return $this->belongsTo(SolicitudPropuesta::class);
    }
}
