<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php
  echo $js;
  echo $css;
  ?>

  <title>Week 10</title>
</head>

<body>
  <?= $header; ?>

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h1>
          Manage Products
          <small class="text-muted">Northwind Traders</small>
        </h1>
      </div>
      <div class="col-md-2">
        <a href="<?= site_url('insert'); ?>" class="btn btn-primary pull-right">
          <i class="fa fa-plus-circle" aria-hidden="true"></i>
          Product
        </a>
      </div>
    </div>
    <hr>
    <table id="products-table" class="table table-striped table-bordered">
      <thead>
        <th>ID</th>
        <th>Nama Produk</th>
        <th>Qty Per Unit</th>
        <th>Price</th>
      </thead>
      <tbody>
        <?php foreach ($products as $idx => $row) : ?>
          <tr>
            <td><?= $row['id_product']; ?></td>
            <td><?= $row['product_name']; ?></td>
            <td><?= $row['qty_per_unit']; ?></td>
            <td><?= $row['price']; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <?= $footer; ?>
</body>

</html>