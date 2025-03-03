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
        header("Location: " . base_url() . "categories");
    }

    // Crear una nueva categoría
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];

            $category = new Category();
            $category->name = $name;
            $category->save();

            header("Location: " . base_url() . "categories");
            exit();
        }
        $this->view("create");
    }

    // Editar una categoría existente
    public function edit(...$params)
    {
        if (isset($params[0])) {
            $category = Category::find($params[0]);
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $category->name = $_POST['name'];
                $category->save();
                header("Location: " . base_url() . "categories");
                exit();
            }
            $this->view("edit", ['category' => $category]);
        } else {
            header("Location: " . base_url() . "categories");
        }
    }

    // Eliminar una categoría
    public function delete(...$params)
    {
        if (isset($params[0])) {
            $category = Category::find($params[0]);
            if ($category) {
                $category->delete();
            }
        }
        header("Location: " . base_url() . "categories");
    }
}



?>
