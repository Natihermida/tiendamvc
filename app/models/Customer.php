<?php
namespace Formacom\Models;
use Illuminate\Database\Eloquent\Model;
class Customer extends Model{
    protected $table="customer";
    protected $primaryKey = 'customer_id';
    public function addresses(){
        return $this->hasMany(Address::class,"customer_id");
    }
    public function phones(){
        return $this->hasMany(Phone::class,"customer_id");
    }
}

?>