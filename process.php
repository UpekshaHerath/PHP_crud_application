<?php
$mysqli = new mysqli('localhost', 'root', '', 'php_crud_application') or die(mysqli_error($mysqli));

session_start();

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $location = $_POST['location'];

    $mysqli->query("INSERT INTO city (name, location) VALUES ('$name', '$location')") or
            die($mysqli->error);

    $_SESSION['message'] = "Record has been saved !";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");
        
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli-> query("DELETE FROM city WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been deleted !";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");
}


