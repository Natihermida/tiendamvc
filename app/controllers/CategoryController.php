<?php
namespace Formacom\controllers;

use Formacom\Core\Controller;
use Formacom\Models\Category;

class CategoryController extends Controller
{
    // Mostrar todas las categorías
    public function index(...$params) // <- Agregar ...$params aquí
    {
        $categories = Category::all();
        $this->view('home_category', ['categories' => $categories]);
    }

    // Mostrar una categoría específica
    public function show(...$params)
    {
        if (isset($params[0])) {
            $category = Category::find($params[0]);
            if ($category) {
                $this->view("home_category", ['category' => $category]);
                exit();
            }
        }
        header("Location: " . base_url() . "category");
    }

    // Crear una nueva categoría
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];

            $category = new Category();
            $category->name = $name;
            $category->description = $_POST['description'] ?? '';
            $category->save();

            header("Location: " . base_url() . "category");
            exit();
        }
        $this->view("create");
    }

    public function edit(...$params)
    {
        if (isset($params[0])) {
            $category = Category::find($params[0]); //where para que devuelva una lista de categorías
    
          
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $category->name = $_POST['name'];
                $category->description = $_POST['description'] ?? ''; // Evitar error si falta
                $category->save();
                header("Location: " . base_url() . "category");
                exit();
            }
    
            //  Verifica que el nombre de la vista sea correcto
            $this->view("edit", ['category' => $category]); // solo pasar el nombre del archivo*


            return;
        }
    
        header("Location: " . base_url() . "category");
    }
    public function delete(...$params)
    {
        if (isset($params[0])) {
            $category = Category::find($params[0]);
            if ($category) {
                $category->delete();
            }
        }
        header("Location: " . base_url() . "category");
    }
}    