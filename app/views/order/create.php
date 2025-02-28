<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Crear Orden</title>
</head>

<body>
    <div class="container">
        <h1>Crear Nueva Orden</h1>
        <form method="POST" action="{{ route('orders.store') }}">
            @csrf
            <div class="mb-3">
                <label for="customer_id" class="form-label">Cliente</label>
                <select class="form-select" id="customer_id" name="customer_id" required>
                    @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="provider_id" class="form-label">Proveedor</label>
                <select class="form-select" id="provider_id" name="provider_id" required>
                    @foreach($providers as $provider)
                    <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="products" class="form-label">Productos</label>
                <div id="products">
                    <div class="product-item">
                        <select class="form-select" name="products[0][product_id]" required>
                            @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                        <input type="number" class="form-control" name="products[0][quantity]" placeholder="Cantidad" required>
                        <input type="number" class="form-control" name="products[0][price]" placeholder="Precio" required>
                        <button type="button" class="btn btn-danger remove-product">Eliminar</button>
                    </div>
                </div>
                <button type="button" class="btn btn-success add-product">Añadir Producto</button>
            </div>

            <div class="mb-3">
                <label for="total_price" class="form-label">Precio Total</label>
                <input type="number" class="form-control" id="total_price" name="total_price" required>
            </div>

            <button type="submit" class="btn btn-primary">Crear Orden</button>
        </form>
    </div>

    <script>
        document.querySelector('.add-product').addEventListener('click', function() {
            var productHtml = `
                <div class="product-item">
                    <select class="form-select" name="products[][product_id]" required>
                        @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    <input type="number" class="form-control" name="products[][quantity]" placeholder="Cantidad" required>
                    <input type="number" class="form-control" name="products[][price]" placeholder="Precio" required>
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

