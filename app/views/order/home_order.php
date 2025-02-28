<!-- resources/views/orders/home_order.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Home Order</title>
</head>

<body>
    <div class="container">
        <h1>Gestión de Órdenes</h1>



        <!-- Botón para crear nueva orden -->
        <a href="" class="btn btn-primary mb-3">Crear Nueva Orden</a>

        <!-- Tabla para listar las órdenes -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Cliente</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $order) { ?>
                    <tr>
                        <td><?= $order->order_id ?></td>
                        <td><?= $order->customer->name ?></td>
                        <td><?= $order->total ?></td>
                        <td>
                           <?php foreach ($order->products as $key => $product) {?>
                            <p> <?=$product->name?></p>
                          <?php }?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>