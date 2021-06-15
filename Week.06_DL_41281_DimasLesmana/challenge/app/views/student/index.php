<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Mahasiswa</title>
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
          <li class="active"><a href="#student">Student</a></li>
        </ul>
      </div>
    </nav>
  </header>

  <section id="student">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <a href="<?= BASEURL; ?>student/add/" class="btn btn-primary" style="float: right; margin-bottom: 1%;">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>
            Student
          </a>
        </div>
      </div>
      <table id="student-table" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>#</th>
            <th>Student ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($_SESSION['students'] as $idx => $student) : ?>
            <tr>
              <td><?= $idx + 1 ?></td>
              <td><?= $student['student_id'] ?></td>
              <td><?= $student['first_name'] ?></td>
              <td><?= $student['last_name'] ?></td>
              <td>
                <a href="<?= BASEURL; ?>student/delete/<?= $student['id'] ?>" onclick="return confirm('Apakah anda yakin?');"><i class='fa fa-times-circle' aria-hidden='true'></i></a><br>
                <a href="<?= BASEURL; ?>student/edit/<?= $student['id'] ?>"><i class='fa fa-wrench' aria-hidden='true'></i></a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
            <th>#</th>
            <th>Student ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Action</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </section>

  <div id="loginModal" class="modal fade" role="dialog">
    <div class="container">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Sign In</h4>
          </div>
          <div class="modal-body">
            <form id="loginForm" action="" method="post" autocomplete="on">
              <div class="form-group <?= (!empty($_SESSION['status']['email_err'])) ? 'has-error' : ''; ?>">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Masukkan email" name="email">
                <span class="help-block"><?= $_SESSION['status']['email_err']; ?></span>
              </div>
              <div class="form-group <?= (!empty($_SESSION['status']['pass_err'])) ? 'has-error' : ''; ?>">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Masukkan password" name="password">
                <span class="help-block"><?= $_SESSION['status']['pass_err']; ?></span>
              </div>
              <button type="submit" class="btn btn-primary">Sign In</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#student-table').DataTable();

      <?php if (!$_SESSION['status']['logged_in']) : ?>
        $('#loginModal').modal({
          keyboard: false,
          show: true,
          backdrop: 'static'
        });
      <?php else : ?>
        $('#loginModal').modal('hide');
      <?php endif; ?>
    });
  </script>
</body>

</html>