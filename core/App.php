<?php
namespace Formacom\Core;
class App{ //enrutador de la aplicacion
    protected $controller="Formacom\\Controllers\\LoginController";
    protected $method="index";
    protected $params=[];
    protected $middlewares = [];

    public function __construct(){
        $url=$this->parseUrl();
       
         // Verificar el controlador
         if(file_exists('./app/controllers/' . ucfirst($url[0]) . 'Controller.php')) {
            $this->controller = "Formacom\\Controllers\\".ucfirst($url[0]) . 'Controller';
            unset($url[0]);
        }
        $this->controller = new $this->controller;

         // Verificar el método
         if(isset($url[1])) {
            if(method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
           // Parámetros
           $this->params = $url ? array_values($url) : [];
           //Lo ejecutamos despues del midelware
           //call_user_func_array([$this->controller, $this->method], $this->params);
      
    }
     /**
     * Permite agregar middlewares a la aplicación.
     * @param object $middleware
     */
    public function addMiddleware($middleware) {
        $this->middlewares[] = $middleware;
    }
/**
     * Ejecuta la aplicación: se añade el nombre del controlador al request y se aplican los middlewares.
     */
    public function run() {
        // Preparamos un request simulando un array (puedes usar un objeto Request si lo prefieres)
        $request = $_SERVER;
        // Agregamos el nombre del controlador para que el middleware lo conozca
        $request['controller'] = get_class($this->controller);

        $this->applyMiddlewares($request, function($request) {
            call_user_func_array([$this->controller, $this->method], $this->params);
        });
    }
    /**
     * Aplica recursivamente los middlewares.
     * @param array $request
     * @param callable $next
     * @param int $index
     */
    protected function applyMiddlewares($request, $next, $index = 0) {
        if (isset($this->middlewares[$index])) {
            $middleware = $this->middlewares[$index];
            $middleware->handle($request, function($request) use ($next, $index) {
                $this->applyMiddlewares($request, $next, $index + 1);
            });
        } else {
            $next($request);
        }
    }
    private function parseUrl() {
        if(isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return ['login','index'];
    }
}
?>