<?php
require_once("config.php");

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: index.php");
    exit;
} else {
    $id = $_GET['id'];

    $query = "DELETE FROM students WHERE id = :id";

    if ($stmt = $conn->prepare($query)) {
        $stmt->bindParam(":id", $param_id, PDO::PARAM_INT);

        $param_id = $id;

        if ($stmt->execute()) {
            header("Location: index.php");
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        unset($stmt);
    }
    unset($conn);
}
?>