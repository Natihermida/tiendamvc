<?php
require_once("./config/database.php");
require_once("./core/helpers.php");
use Formacom\Core\App;
use Formacom\Core\middelware\SessionMiddleware;


$app=new App();

// Agregamos el middleware de sesión, especificando que controladores no requieren sesión.
// Por ejemplo, si tienes un LoginController y RegisterController, los exentas:
$app->addMiddleware(new SessionMiddleware([
    'Formacom\controllers\LoginController'
    ]));
$app->run();
?>