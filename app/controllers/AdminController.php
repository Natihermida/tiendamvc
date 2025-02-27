<?php
namespace Formacom\controllers;
use Formacom\Core\Controller;
class AdminController extends Controller{
    public function index(...$params){
        $data = ['mensaje' => '¡Bienvenido a la página de inicio!'];
        $this->view('home_admin', $data);
    }
    public function new(){
        echo "Hola desde New de HomeController";
    }
    
    
}//menu de administrador
?>