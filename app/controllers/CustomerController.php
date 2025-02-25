<?php
namespace Formacom\controllers;
use Formacom\Core\Controller;
use Formacom\Models\Customer;
use Formacom\Models\Address;

class CustomerController extends Controller{
    public function index(...$params){
    
        $customers=Customer::all();//leer todos los clientes para pasarlos a la vista
        $data = ['mensaje' => '¡Bienvenido a la página de inicio!'];
        $this->view('home', $customers);
    }
   
    public function show(...$params){
        if(isset($params[0])){//si existe el cliente devuelve vista, si no existe, redirige a vista detail
            $customer=Customer::find($params[0]);
        }
        if($customer){
            $this->view("detail",$customer);
            exit();
        }
       header("Location:" .base_url()."customer");
    
        }
}



?>
