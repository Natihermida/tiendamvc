<?php
namespace Formacom\Models;

use Formacom\Core\Model as CoreModel;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class Order extends EloquentModel
{
    // Definir la tabla
    protected $table = 'order';

    // Definir la clave primaria
    protected $primaryKey = 'order_id';
    
    // Relación muchos a muchos con Product a través de la tabla intermedia order_has_product
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_has_product', 'order_id', 'product_id')->withTimestamps();
        
    }
    public function customer(){
        return $this->belongsTo(Customer::class,"customer_id");
    }
}

