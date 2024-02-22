<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Categoria extends Model
{
    use HasUuids;
    protected $fillable = ['nombre', 'is_deleted'];
    /**
     * @var string $table Nombre de la tabla en la base de datos
     */
    protected $table = 'categorias';


    /**
     * @param $nombre Nombre de la categoría
     * @return null | int
     */
    public static function getIdPorNombre($nombre)
    {
        $categoria = Categoria::where('nombre', $nombre)->first();
        return $categoria ? $categoria->id : null;
    }
    /**
     * @param $id Identificador de la categoría
     * @return null | string
     */
    public static function getNombrePorId($id)
    {
        $categoria = self::find($id);
        return $categoria ? $categoria->nombre : null;
    }

    /**
     * @return mixed Nombres de las categorías
     */
    public static function getNombres()
    {
        return self::pluck('nombre');
    }

    /**
     * @return Relacion con la tabla funkos, un categoria tiene muchos funkos asociados y un funko pertenece a una categoria
     */
    public function funkos()
    {
        return $this->hasMany(Funko::class);
    }
}
