<?php
namespace Formacom\controllers;

use Formacom\Core\Controller;
use Formacom\Models\Order;
use Formacom\Models\Product;
use Formacom\Models\Customer;
use Formacom\Models\Provider;

class OrderController extends Controller
{
    // Mostrar todas las órdenes
    public function index(...$params)
    {
        $orders = Order::all(); // Obtener todas las órdenes
        $this->view('home_order', $orders); // Mostrar la vista con las órdenes
    }

    // Mostrar detalles de una orden específica
    public function show(...$params)
    {
        if (isset($params[0])) { // Si existe el ID de la orden, la muestra
            $order = Order::find($params[0]);
            if ($order) {
                $this->view("detail_order", ['home_order' => $order]); // Mostrar la vista de detalles de la orden
                exit();
            }
        }
        header("Location: " . base_url() . "home_order"); // Redirigir si no se encuentra la orden
    }

    // Crear una nueva orden
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $customer_id = $_POST['customer_id']; // Cliente relacionado con la orden
            $provider_id = $_POST['provider_id']; // Proveedor relacionado con la orden
            $product_id = $_POST['product_id']; // Producto relacionado con la orden
            $quantity = $_POST['quantity']; // Cantidad de productos en la orden
            $total_price = $_POST['total_price']; // Precio total de la orden

            // Crear la nueva orden
            $order = new Order();
            $order->customer_id = $customer_id;
            $order->provider_id = $provider_id;
            $order->product_id = $product_id;
            $order->quantity = $quantity;
            $order->total_price = $total_price;
            $order->save(); // Guardar la orden en la base de datos

            header("Location: " . base_url() . "home_order"); // Redirigir al listado de órdenes
            exit();
        }

        // Obtener los productos, proveedores y clientes disponibles para el formulario
        $products = Product::all();
        $providers = Provider::all();
        $customers = Customer::all();

        $this->view("create_order", ['products' => $products, 'providers' => $providers, 'customers' => $customers]); // Mostrar formulario de creación
    }

    // Editar una orden existente
    public function edit(...$params)
    {
        if (isset($params[0])) {
            $order = Order::find($params[0]); // Buscar la orden por ID

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Actualizar los campos de la orden
                $order->customer_id = $_POST['customer_id'];
                $order->provider_id = $_POST['provider_id'];
                $order->product_id = $_POST['product_id'];
                $order->quantity = $_POST['quantity'];
                $order->total_price = $_POST['total_price'];
                $order->save(); // Guardar los cambios

                header("Location: " . base_url() . "home_order"); // Redirigir al listado de órdenes
                exit();
            }

            // Obtener los productos, proveedores y clientes para el formulario de edición
            $products = Product::all();
            $providers = Provider::all();
            $customers = Customer::all();

            $this->view("edit_order", ['order' => $order, 'products' => $products, 'providers' => $providers, 'customers' => $customers]); // Mostrar formulario de edición
        } else {
            header("Location:" . base_url() . "home_order"); // Redirigir si no se encuentra el ID de la orden
        }
    }

    // Eliminar una orden
    public function delete(...$params)
    {
        if (isset($params[0])) {
            $order = Order::find($params[0]); // Buscar la orden por ID
            if ($order) {
                $order->delete(); // Eliminar la orden
            }
        }
        header("Location:" . base_url() . "home_order"); // Redirigir al listado de órdenes
    }
}






?>
