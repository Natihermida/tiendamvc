<?php

namespace Formacom\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product"; // Nombre de la tabla en la BD
    protected $primaryKey = 'product_id'; // Clave primaria
    
    // Permitir asignación masiva en estos campos
    protected $fillable = ['name', 'description', 'stock', 'price', 'category_id', 'provider_id'];

    // Relación: un producto pertenece a una categoría
    public function category()
    {
        return $this->belongsTo(Category::class, "category_id", "category_id");
    }

    // Relación: un producto pertenece a un proveedor
    public function provider()
    {
        return $this->belongsTo(Provider::class, "provider_id", "provider_id");
    }
}
?>


