
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Providers</title>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Providers List</h1>
        <a href="<?= base_url() ?>provider/create" class="btn btn-primary mb-3">Add New Provider</a>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data["providers"] as $provider): ?>
                    <tr>
                        <td><?= $provider->provider_id ?></td>
                        <td><?= htmlspecialchars($provider->name) ?></td>
                        <td>
                            <a href="<?= base_url() ?>provider/show/<?= $provider->provider_id ?>" class="btn btn-info btn-sm">View</a>
                            <a href="<?= base_url() ?>provider/edit/<?= $provider->provider_id ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= base_url() ?>provider/delete/<?= $provider->provider_id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
