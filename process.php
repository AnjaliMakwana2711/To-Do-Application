<?php
include('connect.php');
if (isset($_POST["create"])) {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $assign = mysqli_real_escape_string($conn, $_POST["assign"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $sqlInsert = "INSERT INTO tasks(name , assign , type , description) VALUES ('$name','$assign','$type', '$description')";
    if(mysqli_query($conn,$sqlInsert)){
        session_start();
        $_SESSION["create"] = "Task Added Successfully!";
        header("Location:index.php");
    }else{
        die("Something went wrong in Database connection.");
    }
}
if (isset($_POST["edit"])) {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $assign = mysqli_real_escape_string($conn, $_POST["assign"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $sqlUpdate = "UPDATE tasks SET name = '$name', type = '$type', assign = '$assign', description = '$description' WHERE id='$id'";
    if(mysqli_query($conn,$sqlUpdate)){
        session_start();
        $_SESSION["update"] = "Task Updated Successfully!";
        header("Location:index.php");
    }else{
        die("Something went wrong in Database connection.");
    }
}
?>