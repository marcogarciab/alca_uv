<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $numero
 * @property int    $created_at
 * @property int    $updated_at
 * @property int    $deleted_at
 * @property string $nombre
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property string $telefono
 * @property string $observaciones
 * @property Date   $fecha_nacimiento
 */
class Cliente extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clientes';

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
        'numero', 'nombre', 'apellido_paterno', 'apellido_materno', 'telefono', 'fecha_nacimiento', 'observaciones', 'user_id', 'created_at', 'updated_at', 'deleted_at'
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
        'numero' => 'int', 'nombre' => 'string', 'apellido_paterno' => 'string', 'apellido_materno' => 'string', 'telefono' => 'string', 'fecha_nacimiento' => 'date', 'observaciones' => 'string', 'created_at' => 'date', 'updated_at' => 'date', 'deleted_at' => 'date'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'fecha_nacimiento', 'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = true;

    // Scopes...

    // Functions ...

    public function user()
    {
        return $this->hasOne(User::class);
    }


    public function empresas()
    {
        return $this->hasMany(Empresa::class);
    }

    public function getFullNameAttribute()
    {

    return $this->numero . ' ' . $this->nombre . ' ' . $this->apellido_paterno;

    }

    // Relations ...
}
