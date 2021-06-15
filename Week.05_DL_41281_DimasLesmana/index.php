<?php
require_once("config.php");

$email = $pass = "";
$email_err = $pass_err = "";
$show_modal = true;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty(trim($_POST['email']))) {
        $email_err = "Mohon masukkan email anda.";
    } else {
        $email = $_POST['email'];
    }

    if (empty(trim($_POST['password']))) {
        $pass_err = "Mohon masukkan password anda.";
    } else {
        $pass = $_POST['password'];
    }

    if (empty($email_err) && empty($pass_err)) {
        $query = "SELECT * FROM user WHERE email = :email";

        if ($stmt = $conn->prepare($query)) {
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);

            $param_email = $email;

            if ($stmt->execute()) {
                if ($stmt->rowCount() == 1) {
                    if ($row = $stmt->fetch()) {
                        $salt = $row['salt'];
                        $hashed_password = $row['pass'];
                        if (md5($pass . $salt) === $hashed_password) {
                            $show_modal = false;
                        } else {
                            $pass_err = "Password anda salah.";
                        }
                    }
                } else {
                    $email_err = "Email tidak terdaftar.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            unset($stmt);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap.min.css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <style>
        a {
            color: inherit;
        }
    </style>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap.min.js"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">[IF635] Web Programming</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#student">Student</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <div id="student" class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="add_student.php" class="btn btn-primary" style="float: right; margin-bottom: 1%;">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    Student
                </a>

            </div>
        </div>
        <table id="table" class="table table-striped table-bordered" style="width:100%">
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
                <?php
                $query = "SELECT * FROM students";
                $result = $conn->query($query);
                $i = 1;
                foreach ($result as $row) {
                    echo "<tr>";
                    echo "<td>" . $i++ . "</td>";
                    echo "<td>" . $row['student_id'] . "</td>";
                    echo "<td>" . $row['first_name'] . "</td>";
                    echo "<td>" . $row['last_name'] . "</td>";
                    echo "<td>
                    <a href='delete_student.php?id=$row[id]'><i class='fa fa-times-circle' aria-hidden='true'></i></a><br>
                    <a href='edit_student.php?id=$row[id]'><i class='fa fa-wrench' aria-hidden='true'></i></a>
                    </td>";
                    echo "</tr>";
                }

                unset($result, $conn);
                ?>
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

    <div id="loginModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sign In</h4>
                </div>
                <div class="modal-body">
                    <form id="loginForm" action="" method="post">
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Masukkan email" name="email">
                            <span class="help-block"><?php echo $email_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($pass_err)) ? 'has-error' : ''; ?>">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Masukkan password" name="password">
                            <span class="help-block"><?php echo $pass_err; ?></span>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#table').DataTable();

            <?php if ($show_modal) : ?>
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