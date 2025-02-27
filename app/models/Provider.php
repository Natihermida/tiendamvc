<?php
namespace Formacom\Models;
use Illuminate\Database\Eloquent\Model;
class Provider extends Model{
    protected $table="provider";
    protected $primaryKey = 'provider_id';
    public function addresses(){
        return $this->hasMany(Address::class,"provider_id");
    }
    public function phones(){
        return $this->hasMany(Phone::class,"provider_id");
    }
}

?>