<!-- views/categories/create.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Categoría</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-4">
        <nav class="navbar navbar-light bg-light">
            <span class="navbar-brand mb-0 h1">Create new category</span>
        </nav>

        <form action="<?php echo base_url(); ?>category/create" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Category name</label>
                <input type="text" name="name" id="name" class="form-control" required placeholder="Nombre de la categoría">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="3" placeholder="Descripción de la categoría"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Save category</button>
            <a href="<?php echo base_url(); ?>category" class="btn btn-secondary">Volver</a>
        </form>
    </div>
</body>

</html>

