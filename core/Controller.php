<?php
namespace Formacom\Core;
// app/core/Controller.php
abstract class Controller
{
    abstract public function index(...$params);

    public function view($view, $data = [])
    {
        $controllerFullName = get_class($this);
        $parts = explode('\\', $controllerFullName);
        $className = end($parts);
        // Convertimos a minúsculas y removemos la palabra "Controller" para obtener el nombre de la carpeta
        $controllerName = strtolower(str_replace("Controller", "", $className));
        require_once './app/views/'.$controllerName.'/'. $view . '.php';
    }
}
