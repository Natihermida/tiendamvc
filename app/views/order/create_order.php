<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Crear Orden</title>
</head>

<body>
    <div class="container mt-5">
        <h1>Crear Nueva Orden</h1>
        <form method="POST" action="procesar_orden.php">
            
            <div class="mb-3">
                <label for="customer_id" class="form-label">Cliente</label>
                <select class="form-select" id="customer_id" name="customer_id" required>
                    <?php foreach ($data["customers"] as $customer) { ?>
                        <option value="<?= $customer->id ?>"><?= $customer->name ?></option>
                    <?php } ?>
                </select>
            </div>
            
        
            
            <div class="mb-3">
                <label for="products" class="form-label">Productos</label>
                <div id="products">
                    <div class="product-item d-flex gap-2">
                        <select class="form-select" name="products[0][product_id]" required>
                            <?php foreach ($data["products"] as $product) { ?>
                                <option value="<?= $product->id ?>"><?= $product->name ?></option>
                            <?php } ?>
                        </select>
                        <input type="number" class="form-control" name="products[0][quantity]" placeholder="Cantidad" required>
                        <input type="number" class="form-control" name="products[0][price]" placeholder="Precio" required>
                        <button type="button" class="btn btn-danger remove-product">Eliminar</button>
                    </div>
                </div>
                <button type="button" class="btn btn-success mt-2 add-product">Añadir Producto</button>
            </div>
            
            <button type="submit" class="btn btn-primary">Crear Orden</button>
        </form>
    </div>
    
    <script>
        document.querySelector('.add-product').addEventListener('click', function() {
            var index = document.querySelectorAll('.product-item').length;
            var productHtml = `
                <div class="product-item d-flex gap-2 mt-2">
                    <select class="form-select" name="products[${index}][product_id]" required>
                        <?php foreach ($data["products"] as $product) { ?>
                            <option value="<?= $product->id ?>"><?= $product->name ?></option>
                        <?php } ?>
                    </select>
                    <input type="number" class="form-control" name="products[${index}][quantity]" placeholder="Cantidad" required>
                    <input type="number" class="form-control" name="products[${index}][price]" placeholder="Precio" required>
                    <button type="button" class="btn btn-danger remove-product">Eliminar</button>
                </div>
            `;
            document.querySelector('#products').insertAdjacentHTML('beforeend', productHtml);
        });

        document.querySelector('#products').addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-product')) {
                event.target.parentElement.remove();
            }
        });
    </script>
</body>
</html>
