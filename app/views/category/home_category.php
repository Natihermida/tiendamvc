<!-- views/categories/index.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-4">
        <nav class="navbar navbar-light bg-light">
            <span class="navbar-brand mb-0 h1">Categories</span>
        </nav>

        <!-- Botón para crear una nueva categoría -->
        <a href="<?php echo base_url(); ?>category/create" class="btn btn-primary mb-3">Crear Categoría</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data["categories"] as $category): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($category->category_id); ?></td>
                        <td><?php echo htmlspecialchars($category->name); ?></td>
                        <td><?php echo htmlspecialchars($category->description); ?></td>
                        <td>
                            <a href="<?php echo base_url(); ?>category/edit/<?php echo $category->category_id; ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="<?php echo base_url(); ?>category/delete/<?php echo $category->category_id; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>

