<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Add Provider</title>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Add New Provider</h1>
        
             <form action="<?= base_url() ?>provider/create" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Provider Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="website" class="form-label">Website</label>
                <input type="url" class="form-control" id="website" value="http://" name="website" placeholder="http://example.com" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address"  required>
            </div>
            
            <div class="mb-3">
                <label for="address" class="form-label">City</label>
                <input type="text" class="form-control" id="city"  required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Country</label>
                <input type="text" class="form-control" id="country"  required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone"  required>
            </div>
            <button type="submit" class="btn btn-primary">Save Provider</button>
            <a href="<?= base_url() ?>provider" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>

