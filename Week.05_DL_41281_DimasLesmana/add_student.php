<?php
require_once("config.php");

$student_id = $first_name = $last_name = $student_desc = "";
$student_id_err = $first_name_err = $last_name_err = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_desc = $_POST['student_desc'];

    // Validate student id
    if (empty(trim($_POST['student_id']))) {
        $student_id_err = "Please enter student id.";
    } elseif (strlen(trim($_POST['student_id'])) > 12) {
        $student_id_err = "Student ID is too long. <i>(Max 12 characters)</i>";
    } else {
        $student_id = trim($_POST['student_id']);
    }

    // Validate first name
    if (empty(trim($_POST['first_name']))) {
        $first_name_err = "Please enter your first name.";
    } else {
        $first_name = $_POST['first_name'];
    }

    // Validate last name
    if (empty(trim($_POST['last_name']))) {
        $last_name_err = "Please enter your last name.";
    } else {
        $last_name = $_POST['last_name'];
    }

    // Check input errors before inserting in database
    if (empty($student_id_err) && empty($first_name_err) && empty($last_name_err)) {
        $query = "INSERT INTO students (student_id, first_name, last_name, student_desc) VALUES (:student_id, :first_name, :last_name, :student_desc)";

        if ($stmt = $conn->prepare($query)) {
            $stmt->bindParam(":student_id", $param_student_id, PDO::PARAM_STR);
            $stmt->bindParam(":first_name", $param_first_name, PDO::PARAM_STR);
            $stmt->bindParam(":last_name", $param_last_name, PDO::PARAM_STR);
            $stmt->bindParam(":student_desc", $param_student_desc, PDO::PARAM_STR);

            $param_student_id = $student_id;
            $param_first_name = $first_name;
            $param_last_name = $last_name;
            $param_student_desc = $student_desc;

            if ($stmt->execute()) {
                header("Location: index.php");
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            unset($stmt);
        }
    }
    unset($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">[IF635] Web Programming</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="index.php">Student</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <div id="add_student" class="container">
        <form action="" method="post">
            <div class="form-group <?php echo (!empty($student_id_err)) ? 'has-error' : ''; ?>">
                <label for="student_id">Student ID</label>
                <input id="student_id" name="student_id" type="text" class="form-control" placeholder="Student ID">
                <span class="help-block"><?php echo $student_id_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($first_name_err)) ? 'has-error' : ''; ?>">
                <label for="first_name">First Name</label>
                <input id="first_name" name="first_name" type="text" class="form-control" placeholder="First Name">
                <span class="help-block"><?php echo $first_name_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($last_name_err)) ? 'has-error' : ''; ?>">
                <label for="last_name">Last Name</label>
                <input id="last_name" name="last_name" type="text" class="form-control" placeholder="Last Name">
                <span class="help-block"><?php echo $last_name_err; ?></span>
            </div>
            <div class="form-group">
                <label for="student_desc">Description</label>
                <textarea id="student_desc" name="student_desc" class="form-control" placeholder="Description" rows="5"></textarea>
            </div>
            <div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                <a href="index.php" class="btn btn-default">Cancel</a>
            </div>
        </form>
    </div>
</body>

</html>