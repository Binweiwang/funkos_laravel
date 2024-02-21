<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Funko extends Model
{
    /**
     * @var string $IMAGE_DEFAULT URL de la imagen por defecto
     */
    public static string $IMAGE_DEFAULT = 'https://via.placeholder.com/150';
    /**
     * @var string $table Nombre de la tabla en la base de datos
     */
    protected $table = 'funkos';
    /**
     * @var string[] $fillable Campos que se pueden asignar masivamente
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen',
        'precio',
        'cantidad',
        'categoria_id',
        'is_deleted'
    ];
    /**
     * @var string[] $hidden Campos que se ocultan al convertir a JSON
     */
    protected $hidden = [
        'is_deleted',
    ];
    /**
     * @var string[] $casts Conversión de atributos
     */
    protected $casts = [
        'is_deleted' => 'boolean',
    ];

    /**
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($funko) {
            $funko->uuid = (string) Str::uuid();
        });
    }

    /**
     * @param $query Consulta a la base de datos
     * @param $search Búsqueda a realizar
     * @return mixed Consulta a la base de datos
     */
    public function scopeSearch($query, $search)
    {
        return $query->whereRaw('LOWER(nombre) like ?', ['%' . strtolower($search) . '%']);
    }
    /**
     * @return Relación con la tabla categorias, un funko pertenece a una categoria y una categoria tiene muchos funkos
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
