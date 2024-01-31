<?php
include("connect.php");
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "DELETE FROM tasks WHERE id='$id'";
if(mysqli_query($conn,$sql)){
    session_start();
    $_SESSION["delete"] = "Task Deleted Successfully!";
    header("Location:index.php");
}else{
    die("Something went wrong in Database connection.");
}
}else{
    echo "Task does not exist.";
}
?>