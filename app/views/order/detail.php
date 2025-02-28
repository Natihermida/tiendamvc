<!-- app/views/order/detail_order.php -->
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalle de Orden</title>

  <!-- Bootstrap y Font Awesome -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

  <!-- Header y navegación -->
  <header class="bg-primary text-white py-3">
    <div class="container">
      <h1 class="mb-0">Detalle de la Orden #<?php echo $data->id; ?></h1>
      <nav class="mt-2">
        <a href="<?php echo base_url(); ?>order" class="btn btn-light">
          <i class="fa fa-arrow-left"></i> Volver a la lista de órdenes
        </a>
      </nav>
    </div>
  </header>

  <div class="container mt-5">

    <!-- Información de la orden -->
    <section class="mb-5">
      <h2 class="mb-4">Información de la Orden</h2>
      <ul class="list-group">
        <li class="list-group-item"><strong>ID de la Orden:</strong> <?php echo $order->id; ?></li>
        <li class="list-group-item"><strong>Cliente:</strong> <?php echo $order->customer->name; ?></li>
        <li class="list-group-item"><strong>Proveedor:</strong> <?php echo $order->provider->name; ?></li>
        <li class="list-group-item"><strong>Fecha:</strong> <?php echo $order->order_date; ?></li>
        <li class="list-group-item"><strong>Estado:</strong> <?php echo ucfirst($order->status); ?></li>
        <li class="list-group-item"><strong>Total:</strong> €<?php echo number_format($order->total_price, 2); ?></li>
      </ul>
    </section>

    <!-- Productos de la orden -->
    <section>
      <h2 class="mb-4">Productos en la Orden</h2>
      <table class="table table-bordered">
        <thead class="table-primary">
          <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($order->products as $product): ?>
            <tr>
              <td><?php echo $product->name; ?></td> <!-- Nombre del producto -->
              <td><?php echo $product->pivot->quantity; ?></td>
              <td>€<?php echo number_format($product->pivot->price, 2); ?></td>
              <td>€<?php echo number_format($product->pivot->quantity * $product->pivot->price, 2); ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </section>

  </div>

</body>
</html>

