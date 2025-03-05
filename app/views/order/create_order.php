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
                        <select class="form-select" name="products[0][product_id]" required onchange="updateProductInfo(this)">
                            <?php foreach ($data["products"] as $product) { ?>
                                <option value="<?= $product->id ?>" data-stock="<?= $product->stock ?>" data-price="<?= $product->price ?>"><?= $product->name ?></option>
                            <?php } ?>
                        </select>
                        <input type="number" class="form-control" name="products[0][quantity]" placeholder="Cantidad" required onchange="updateProductInfo(this)">
                        <input type="number" class="form-control" name="products[0][price]" placeholder="Precio" required readonly>
                        <span class="stock-info">Stock: <span class="stock-amount">0</span></span>
                        <span class="total-price">Total: $<span class="total">0</span></span>
                        <button type="button" class="btn btn-danger remove-product">Eliminar</button>
                    </div>
                </div>
                <button type="button" class="btn btn-success mt-2 add-product">Añadir Producto</button>
            </div>

            <button type="submit" class="btn btn-primary">Crear Orden</button>
        </form>
    </div>

    <script>
        // Función para actualizar el stock, precio y total de un producto
        function updateProductInfo(input) {
            const productItem = input.closest('.product-item');
            const productSelect = productItem.querySelector('select');
            const quantityInput = productItem.querySelector('input[name*="quantity"]');
            const priceInput = productItem.querySelector('input[name*="price"]');
            const stockSpan = productItem.querySelector('.stock-amount');
            const totalSpan = productItem.querySelector('.total');

            // Obtener los datos del producto seleccionado
            const selectedOption = productSelect.options[productSelect.selectedIndex];
            const stock = selectedOption.getAttribute('data-stock');
            const price = selectedOption.getAttribute('data-price');
            
            // Actualizar el stock y precio
            stockSpan.textContent = stock;
            priceInput.value = price;

            // Calcular el total
            const quantity = parseInt(quantityInput.value) || 0;
            const total = price * quantity;
            totalSpan.textContent = total.toFixed(2);

            // Evitar que se agregue más cantidad que el stock disponible
            if (quantity > stock) {
                alert('No hay suficiente stock para esta cantidad.');
                quantityInput.value = stock;  // Ajustar la cantidad al stock disponible
                totalSpan.textContent = (price * stock).toFixed(2);  // Ajustar el total
            }
        }

        // Añadir un nuevo producto al formulario
        document.querySelector('.add-product').addEventListener('click', function() {
            var index = document.querySelectorAll('.product-item').length;
            var productHtml = `
                <div class="product-item d-flex gap-2 mt-2">
                    <select class="form-select" name="products[${index}][product_id]" required onchange="updateProductInfo(this)">
                        <?php foreach ($data["products"] as $product) { ?>
                            <option value="<?= $product->id ?>" data-stock="<?= $product->stock ?>" data-price="<?= $product->price ?>"><?= $product->name ?></option>
                        <?php } ?>
                    </select>
                    <input type="number" class="form-control" name="products[${index}][quantity]" placeholder="Cantidad" required onchange="updateProductInfo(this)">
                    <input type="number" class="form-control" name="products[${index}][price]" placeholder="Precio" required readonly>
                    <span class="stock-info">Stock: <span class="stock-amount">0</span></span>
                    <span class="total-price">Total: $<span class="total">0</span></span>
                    <button type="button" class="btn btn-danger remove-product">Eliminar</button>
                </div>
            `;
            document.querySelector('#products').insertAdjacentHTML('beforeend', productHtml);
        });

        // Eliminar un producto del formulario
        document.querySelector('#products').addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-product')) {
                event.target.parentElement.remove();
            }
        });

        // Llamar a la función de actualización para los productos iniciales
        document.querySelectorAll('.product-item').forEach(item => {
            updateProductInfo(item.querySelector('select'));
        });
    </script>
</body>

</html>
