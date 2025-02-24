<?php
require 'vendor/autoload.php';
require 'config/config.php';

use Illuminate\Database\Capsule\Manager as Capsule;

// Configuración de la conexión
$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',         // o 'sqlite', 'pgsql', 'sqlsrv'
    'host'      => HOST,
    'database'  => DB_DATABASE,
    'username'  => DB_USER,
    'password'  => DB_PASS,
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Hacer que Capsule esté disponible de manera global
$capsule->setAsGlobal();

// Arrancar Eloquent ORM
$capsule->bootEloquent();
