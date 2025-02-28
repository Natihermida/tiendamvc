<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Edit Customer</title>
</head>

<body>
    <div class="container">
        <h1>Edit Customer</h1>
        <form method="POST" action="<?php echo base_url(); ?>customer/edit/<?php echo $customer->id; ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Customer Name</label>
                <input name="name" type="text" class="form-control" id="name" value="<?php echo $customer->name; ?>" required>
            </div>
            <div class="mb-3">
                <label for="street" class="form-label">Street</label>
                <input name="street" type="text" class="form-control" id="street" value="<?php echo $customer->addresses()->first()->street; ?>">
            </div>
            <div class="mb-3">
                <label for="zip_code" class="form-label">Zip Code</label>
                <input name="zip_code" type="text" class="form-control" id="zip_code" value="<?php echo $customer->addresses()->first()->zip_code; ?>">
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input name="city" type="text" class="form-control" id="city" value="<?php echo $customer->addresses()->first()->city; ?>">
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <input name="country" type="text" class="form-control" id="country" value="<?php echo $customer->addresses()->first()->country; ?>">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input name="phone" type="text" class="form-control" id="phone" value="<?php echo $customer->phones()->first()->number; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>

</body>

</html>

