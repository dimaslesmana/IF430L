<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data Mahasiswa</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
  <style type="text/css">
    a {
      color: inherit;
    }
  </style>
</head>

<body>
  <header>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?= BASEURL; ?>">[IF430] Web Programming</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="<?= BASEURL; ?>">Student</a></li>
        </ul>
      </div>
    </nav>
  </header>
  <section id="add_student">
    <div class="container">
      <form action="" method="post" autocomplete="off">
        <div class="form-group <?= (!empty($_SESSION['status']['student_id_err'])) ? 'has-error' : ''; ?>">
          <label for="student_id">Student ID</label>
          <input id="student_id" name="student_id" type="text" class="form-control" placeholder="Student ID" value="<?= $data['student_id']; ?>">
          <span class="help-block"><?= $_SESSION['status']['student_id_err']; ?></span>
        </div>
        <div class="form-group <?= (!empty($_SESSION['status']['first_name_err'])) ? 'has-error' : ''; ?>">
          <label for="first_name">First Name</label>
          <input id="first_name" name="first_name" type="text" class="form-control" placeholder="First Name" value="<?= $data['first_name']; ?>">
          <span class="help-block"><?= $_SESSION['status']['first_name_err']; ?></span>
        </div>
        <div class="form-group <?= (!empty($_SESSION['status']['last_name_err'])) ? 'has-error' : ''; ?>">
          <label for="last_name">Last Name</label>
          <input id="last_name" name="last_name" type="text" class="form-control" placeholder="Last Name" value="<?= $data['last_name']; ?>">
          <span class="help-block"><?= $_SESSION['status']['last_name_err']; ?></span>
        </div>
        <div class="form-group">
          <label for="student_desc">Description</label>
          <textarea id="student_desc" name="student_desc" class="form-control" placeholder="Description" rows="5"><?= $data['student_desc']; ?></textarea>
        </div>
        <input type="text" name="id" value=<?= $data['id']; ?> hidden>
        <div>
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          <a href="<?= BASEURL; ?>" class="btn btn-default">Cancel</a>
        </div>
      </form>
    </div>
  </section>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap.min.js"></script>
</body>

</html>