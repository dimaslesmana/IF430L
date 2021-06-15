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

  <title>Week 09</title>
</head>

<body>
  <?= $header; ?>
  <div class="container">
    <table id="my-table" class="table table-striped table-bordered">
      <thead>
        <th>No</th>
        <th>Nama</th>
        <th>Jabatan</th>
        <th>Salary</th>
        <th>No. Telepon</th>
        <th>Alamat</th>
      </thead>
      <tbody>
        <?php foreach ($employees as $idx => $row) : ?>
          <tr>
            <td><?= $idx + 1; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['jabatan']; ?></td>
            <td><?= $row['gaji']; ?></td>
            <td><?= $row['telp']; ?></td>
            <td><?= $row['alamat']; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <?= $footer; ?>
</body>

</html>