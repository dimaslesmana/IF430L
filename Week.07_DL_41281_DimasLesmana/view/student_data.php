<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Data</title>

    <link rel='stylesheet' href='assets/bootstrap-3.3.7/dist/css/bootstrap.min.css'>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="#" class="navbar-brand">[IF430] Web Programming</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">Students</a></li>
                </ul>
            </div>
        </nav>
        <?php if (isset($valid) && $valid) : ?>
            <form action="index.php" method=post>
                <input type="hidden" name="loc" value="add_student.php">
                <button type="submit" name="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus">&nbsp;Student</span></button>
            </form>
            <br>
            <br>
            <table id="dat" class="table table-striped table-bordered">
                <thead>
                    <th>Student Name</th>
                    <th>Student NIM</th>
                    <th>Student Angkatan</th>
                    <th>Student Jurusan</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM siswa;";
                    $result = $conn->query($query);
                    $students = array();
                    foreach ($result as $row) {
                        array_push($students, new Student($row['Student_Id'], $row['Student_Name'], $row['Student_Nim'], $row['Student_Angkatan'], $row['Student_Jurusan']));
                    }
                    ?>
                    <?php foreach ($students as $row) : ?>
                        <tr>
                            <td><?= $row->getStudent_Name(); ?></td>
                            <td><?= $row->getStudent_Nim(); ?></td>
                            <td><?= $row->getStudent_Angkatan(); ?></td>
                            <td><?= $row->getStudent_Jurusan(); ?></td>
                            <td>
                                <div class="col-sm-3">
                                    <form action="index.php" method="post">
                                        <input type="hidden" name="Student_Id" value="<?= $row->getStudent_Id(); ?>">
                                        <input type="hidden" name="loc" value="edit_student.php">
                                        <button type="submit" name="submit" class="btn btn-link"><span class="glyphicon glyphicon-edit"></span></button>
                                    </form>
                                </div>
                                <div class="col-sm-3">
                                    <form action="index.php" method="post">
                                        <input type="hidden" name="Student_Id" value="<?= $row->getStudent_Id(); ?>">
                                        <input type="hidden" name="do" value="delete_student.php">
                                        <button type="submit" name="submit" class="btn btn-link"><span class="glyphicon glyphicon-remove"></span></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <th>Student Name</th>
                    <th>Student NIM</th>
                    <th>Student Angkatan</th>
                    <th>Student Jurusan</th>
                    <th></th>
                </tfoot>
            </table>
        <?php endif; ?>
    </div>

    <div class="modal fade" id="login" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title text-center">Login</h1>
                </div>
                <div class="modal-body">
                    <form action="index.php" method="post">
                        <div class="form-group row">
                            <label for="username" class="col-sm-3">Username:</label>
                            <div class="col-sm-6">
                                <input class="form-control" type="text" name="username">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-3">Password:</label>
                            <div class="col-sm-6">
                                <input class="form-control" type="password" name="password">
                            </div>
                        </div>
                        <?php if (isset($valid) && !$valid) { ?>
                            <p class="text-danger">Invalid credentials.</p>
                        <?php } ?>
                        <input type="hidden" name="do" value="check_loginuser.php">
                        <button type="submit" name="submit" class="btn btn-primary">Login</button>
                        <button type="submit" name="loc" value="register_user.php" class="btn btn-warning">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/jquery-3.2.1.min.js"></script>
    <script src="assets/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
    <script>
        $(function() {
            $('#login').modal({
                backdrop: 'static',
                keyboard: false,
                show: <?php echo (isset($valid) && $valid) ? "false" : "true"; ?>
            });
        });
    </script>
</body>

</html>