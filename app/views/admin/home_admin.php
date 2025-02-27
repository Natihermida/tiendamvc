<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Admin</title>
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="container text-center">
        <h1 class="mb-4">Main Menu</h1>
        <div class="d-grid gap-3 col-6 mx-auto">
            <a href="<?=base_url()?>product" class="btn btn-primary btn-lg"><i class="fas fa-box"></i> Products</a>
            <a href="<?=base_url()?>customer" class="btn btn-success btn-lg"><i class="fas fa-users"></i> Customers</a>
            <a href="<?=base_url()?>provider" class="btn btn-warning btn-lg"><i class="fas fa-truck"></i> Providers</a>
            <a href="<?=base_url()?>category" class="btn btn-danger btn-lg"><i class="fas fa-tags"></i> Categories</a>
        </div>
    </div>
</body>
</html>

