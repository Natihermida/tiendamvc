<?php
namespace Formacom\controllers;
use Formacom\Core\Controller;
use Formacom\Models\Customer;
use Formacom\Models\Address;
use Formacom\Models\Category;
use Formacom\Models\Provider;
use Formacom\Models\Product;

class ApiController extends Controller{
    public function index(...$params){
        
    }

    public function categories() {
        $categories=Category::all();
        $json=json_encode($categories);
        header('Content-Type: application/json');
        echo $json;
        exit();
    }
    public function providers() {
        $providers=Provider::all();
        $json=json_encode($providers);
        header('Content-Type: application/json');
        echo $json;
        exit();
    }
    public function newproduct(){
        try{
        $data=json_decode(file_get_contents('php://input'),true);
        $product=new Product();
        $product->name=$data['name'];
        $product->description=$data['description'];
        $product->category_id=$data['category_id'];
        $product->provider_id=$data['provider_id'];
        $product->stock=$data['stock'];
        $product->price=$data['price'];
        $product->save();
        }catch(\Exception $e){
            $product=['error'=>$e->getMessage()];
        }
        $products=Product::with(['category','provider'])->get();
        $json=json_encode($products);
        header('Content-Type: application/json');
        echo $json;
        exit();
    }
   
}
?>
   

