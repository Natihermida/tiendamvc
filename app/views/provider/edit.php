<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Proveedor</title>
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="container">
        <h2 class="text-center mb-4">Editar Proveedor</h2>



        <form action="<?= base_url() ?>provider/edit" method="POST">
            <input type="hidden" name="id" value="<?= $data->provider_id ?>">

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($data->name) ?>" required>
            </div>

            <h5 class="mt-4">Dirección</h5>
            <div class="mb-3">
                <label for="street" class="form-label">Street</label>
                <input type="text" class="form-control" id="street" name="street" value="<?= isset($data->addresses[0]) ? htmlspecialchars($data->addresses[0]->street) : '' ?>">
            </div>
            <div class="mb-3">
                <label for="zip_code" class="form-label">Zip Code</label>
                <input type="text" class="form-control" id="zip_code" name="zip_code" value="<?= isset($data->addresses[0]) ? htmlspecialchars($data->addresses[0]->zip_code) : '' ?>">
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" value="<?= isset($data->addresses[0]) ? htmlspecialchars($data->addresses[0]->city) : '' ?>">
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <input type="text" class="form-control" id="country" name="country" value="<?= isset($data->addresses[0]) ? htmlspecialchars($data->addresses[0]->country) : '' ?>">
            </div>

            <h5 class="mt-4">Teléfono</h5>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?= isset($data->phones[0]) ? htmlspecialchars($data->phones[0]->number) : '' ?>">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">web</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?= isset($data->phones[0]) ? htmlspecialchars($data->phones[0]->number) : '' ?>">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Guardar Cambios</button>
                <a href="<?= base_url() ?>provider" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>


