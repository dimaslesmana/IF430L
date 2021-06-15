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
    <h1>
      Add Product
      <small class="text-muted">Northwind Traders</small>
    </h1>
    <hr>

    <form action="<?= site_url('insert/insert_action'); ?>" method="post">
      <div class="form-group row">
        <label for="product_name" class="col-sm-2 col-form-label">Product Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="id_supplier" class="col-sm-2 col-form-label">Supplier</label>
        <div class="col-sm-10">
          <select class="form-control" id="id_supplier" name="id_supplier" required>
            <option selected disabled>Select supplier...</option>
            <?php foreach ($suppliers as $supplier) : ?>
              <option value="<?= $supplier['id_supplier']; ?>"><?= $supplier['supplier_name']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="id_category" class="col-sm-2 col-form-label">Category</label>
        <div class="col-sm-10">
          <select class="form-control" id="id_category" name="id_category" required>
            <option selected disabled>Select category...</option>
            <?php foreach ($categories as $category) : ?>
              <option value="<?= $category['id_category']; ?>"><?= $category['category_name']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="qty_per_unit" class="col-sm-2 col-form-label">Quantity Per Unit</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="qty_per_unit" id="qty_per_unit" placeholder="Quantity Per Unit" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="price" class="col-sm-2 col-form-label">Price</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="price" id="price" placeholder="Price" required>
        </div>
      </div>
      <div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <a href="<?= base_url(); ?>" class="btn btn-default">Cancel</a>
      </div>
    </form>
  </div>

  <?= $footer; ?>
</body>

</html>