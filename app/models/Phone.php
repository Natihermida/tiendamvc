<?php
namespace Formacom\Models;
use Illuminate\Database\Eloquent\Model;
class Phone extends Model{
    protected $table="phone";
    protected $primaryKey = 'phone_id';
    public function customer(){
        return $this->belongTo(Customer::class, "customer_id");
    }

}


?>
