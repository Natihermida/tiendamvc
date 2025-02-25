<?php
namespace Formacom\controllers;

use Formacom\Core\Controller;
use Formacom\Models\User;


class LoginController extends Controller
{
    public function index(...$params)
    {

        $this->view("login");
    }
    public function login(...$params)
    {
        if (isset($_POST["user_name"])) { //comprueba que manda datos por login
            $user = User::where("user_name", $_POST["user_name"])->first(); //metodo where devuelve una lista,y first el primer objeto
            //comprobar que la contraseña esta bien
            if ($user && password_verify($_POST["password"], $user->password)) {
                session_start();
                $_SESSION["user_id"]=$user->user_id;
                $_SESSION["user_name"]=$user->username;
                header("location: ". base_url() ."admin");
            } else {
                $error = "user or pass incorrect";
                $this->view("login", [$error]);
            }
            exit();
        } else {
            header("Location: " . base_url() . "login");
        }
    }

    public function register(...$params)
    {
        $this->view("register");
    }

}
