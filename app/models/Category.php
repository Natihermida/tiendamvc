<?php
namespace Formacom\Models;
use Illuminate\Database\Eloquent\Model;
class Category extends Model{
    protected $table="category";
    protected $primaryKey = 'category_id';
    

      // Permitir la asignación masiva en estos campos
      protected $fillable = ['name', 'description'];

      // Relación: una categoría puede tener muchos productos
      public function products()
      {
          return $this->hasMany(Product::class, 'category_id', 'category_id');
      }
}

?>