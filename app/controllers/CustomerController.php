<?php

namespace Formacom\controllers;

use Formacom\Core\Controller;
use Formacom\Models\Customer;
use Formacom\Models\Address;
use Formacom\Models\Phone;

class CustomerController extends Controller
{
    public function index(...$params)
    {

        $customers = Customer::all(); //leer todos los clientes para pasarlos a la vista
        $data = ['mensaje' => '¡Bienvenido a la página de inicio!'];
        $this->view('home', $customers);
    }

    public function show(...$params)
    {
        if (isset($params[0])) { //si existe el cliente devuelve vista, si no existe, redirige a vista detail
            $customer = Customer::find($params[0]);
        }
        if ($customer) {
            $this->view("detail", $customer);
            exit();
        }
        header("Location:" . base_url() . "customer");
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);



            // Crear el nuevo cliente
            $customer = new Customer();
            $customer->name = $name;
            $customer->save();
            if (isset($_POST["street"])) {
                $address = new Address();
                $address->street = $_POST["street"];
                $address->zip_code = $_POST["zip_code"];
                $address->city = $_POST["city"];
                $address->country = $_POST["country"];
                $customer->addresses()->save($address);
            }
            if (isset($_POST["phone"])) {
                $phone = new Phone();
                $phone->number = $_POST["phone"];
                $customer->phones()->save($phone);
            }
            header("Location: " . base_url() . "customer");
        }
        $this->view("create"); // Carga la vista del formulario
    }

    // Método para editar un cliente
    public function edit(...$params)
    {
        if (isset($params[0])) {
            $customer = Customer::find($params[0]);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Actualizar el nombre del cliente
                $customer->name = trim($_POST['name']);
                $customer->save();

                // Actualizar la dirección si se ha proporcionado
                if (isset($_POST["street"])) {
                    $address = $customer->addresses()->first(); // Obtener la dirección asociada
                    if ($address) {
                        $address->street = $_POST["street"];
                        $address->zip_code = $_POST["zip_code"];
                        $address->city = $_POST["city"];
                        $address->country = $_POST["country"];
                        $address->save();
                    }
                }

                // Actualizar el teléfono si se ha proporcionado
                if (isset($_POST["phone"])) {
                    $phone = $customer->phones()->first(); // Obtener el teléfono asociado
                    if ($phone) {
                        $phone->number = $_POST["phone"];
                        $phone->save();
                    }
                }

                header("Location: " . base_url() . "customer");
            }

            $this->view("edit", $customer); // Carga la vista de edición con los datos del cliente
        } else {
            header("Location:" . base_url() . "customer");
        }
    }

    // Método para eliminar un cliente
    public function delete(...$params)
    {
        if (isset($params[0])) {
            $customer = Customer::find($params[0]);

            if ($customer) {
                // Eliminar las relaciones asociadas antes de eliminar el cliente
                $customer->addresses()->delete(); // Eliminar todas las direcciones asociadas
                $customer->phones()->delete();    // Eliminar todos los teléfonos asociados

                // Eliminar el cliente
                $customer->delete();
            }
        }
        header("Location:" . base_url() . "customer");
    }

}
