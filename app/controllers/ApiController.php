<?php

namespace Formacom\controllers;

use Formacom\Core\Controller;
use Formacom\Models\Customer;
use Formacom\Models\Address;
use Formacom\Models\Phone;
use Formacom\Models\Category;
use Formacom\Models\Provider;

class ApiController extends Controller
{
    public function index(...$params)
    {

        
    }
public function categories(){
    $categories = Category::all();

        $json=json_encode($categories);
        header('Content-Type: application/json');
        echo $json;
        exit();
    }
    public function provider(){
        $providers = Provider::all();
    
            $json=json_encode($providers);
            header('Content-Type: application/json');
            echo $json;
            exit();
        }

}//API que es controlador y no devuelve vista. (AJAX)
?>
   

