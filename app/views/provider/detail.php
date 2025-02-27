<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src=https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js> </script>
</head>

<body>
  <div class="container">
    <nav class="navbar bg-body-tertiary">
      <div class="container-fluid">
        <span class="navbar-text">
          Provider detail
        </span>
      </div>
    </nav>
    <div class="accordion" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header">
          <?= $data->name ?> - <?= $data->web ?>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">

        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Addresses
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Street</th>
                  <th scope="col">City</th>
                  <th scope="col">Zip Code</th>
                  <th scope="col">Country</th>

                </tr>
              </thead>
              <tbody>
                <?php foreach ($data->addresses as $key => $address) { ?>
                  <tr>
                    <th scope="row"> <?= $address->address_id ?> </th>
                    <td><?= $address->street ?></td>
                    <td><?= $address->city ?></td>
                    <td><?= $address->zip_code ?></td>
                    <td><?= $address->country ?></td>

                  </tr>
                <?php } ?>

              </tbody>
            </table>


          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Phones
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Phones</th>


                </tr>
              </thead>
                  <tbody>
              <?php foreach ($data->phones as $key => $phone) { ?>
                <tr>
                  <th scope="row"> <?= $phone->phone_id ?> </th>
                  <td><?= $phone->number ?></td>


                </tr>


              <?php } ?>
             
            </table>
            </tbody>
          </div>
        </div>
      </div>
    </div>

  </div>
</body>

</html>