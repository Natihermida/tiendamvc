<?php
namespace Formacom\controllers;
use Formacom\Core\Controller;
use Formacom\Models\Provider; 
use Formacom\Models\Address;
use Formacom\Models\Phone;

class ProviderController extends Controller
{
    public function index(...$params)
    {
        $providers = Provider::all(); // leer todos los proveedores para pasarlos a la vista
        $this->view('home_provider', ['providers' => $providers]);
    }

    public function show(...$params)
    {
        if (isset($params[0])) { // si existe el proveedor devuelve vista, si no existe, redirige a vista detail
            $provider = Provider::find($params[0]);
            if ($provider) {
                $this->view("detail", $provider);
                exit();
            }
        }
        header("Location:" . base_url() . "provider");
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
        // Crear el nuevo proveedor
            $provider = new Provider();
            $provider->name = $name;
            $provider->web= $_POST["web"];
            $provider->save();

            // Crear la dirección del proveedor si se proporciona
            if (isset($_POST["street"])) {
                $address = new Address();
                $address->street = $_POST["street"];
                $address->zip_code = $_POST["zip_code"];
                $address->city = $_POST["city"];
                $address->country = $_POST["country"];
                $provider->addresses()->save($address);
            }

            // Crear el teléfono del proveedor si se proporciona
            if (isset($_POST["phone"])) {
                $phone = new Phone();
                $phone->number = $_POST["phone"];
                $provider->phones()->save($phone);
            }

            header("Location: " . base_url() . "provider");
            exit();
        }
        $this->view("create"); // Carga la vista del formulario
    }
    public function edit(...$params)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $name = trim($_POST['name']);

        // Validación básica
        if (empty($name)) {
            $_SESSION['error'] = "El nombre es obligatorio.";
            header("Location: " . base_url() . "provider/edit/$id");
            exit();
        }

        // Buscar el proveedor
        $provider = Provider::find($id);
        if (!$provider) {
            $_SESSION['error'] = "Proveedor no encontrado.";
            header("Location: " . base_url() . "provider");
            exit();
        }

        // Actualizar datos del proveedor
        $provider->name = $name;
        $provider->save();

        // Actualizar la dirección si se proporciona
        if (isset($_POST["street"])) {
            $address = $provider->addresses->first(); // Obtener la primera dirección asociada
            if ($address) {
                $address->street = $_POST["street"];
                $address->zip_code = $_POST["zip_code"];
                $address->city = $_POST["city"];
                $address->country = $_POST["country"];
                $address->save();
            }
        }

        // Actualizar el teléfono si se proporciona
        if (isset($_POST["phone"])) {
            $phone = $provider->phones->first(); // Obtener el primer teléfono asociado
            if ($phone) {
                $phone->number = $_POST["phone"];
                $phone->save();
            }
        }

        // Redirigir nuevamente a la vista de edición con los cambios
        header("Location: " . base_url() . "provider/edit/$id");
        exit();
    }

    // Si se accede a la edición desde un enlace (GET), cargar la vista con los datos
    if (!empty($params[0])) {
        $provider = Provider::find($params[0]);
        if ($provider) {
            $this->view("edit", $provider);
            exit();
        }
    }

    // Redirigir a la lista de proveedores si el ID no es válido
    header("Location: " . base_url() . "provider");
}

    public function delete(...$params)
    {
        if (isset($params[0])) {
            $provider = Provider::find($params[0]);
            if ($provider) {
                $provider->addresses()->delete();
              
                $provider->phones()->delete();
                $provider->products()->delete();
                $provider->delete();
                

            }
        }
        header("Location:" . base_url() . "provider");
    }
}