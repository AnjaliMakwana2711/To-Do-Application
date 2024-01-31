<?php
include('connect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the current completion status
    $sqlSelect = "SELECT completed FROM tasks WHERE id = $id";
    $result = mysqli_query($conn, $sqlSelect);
    $row = mysqli_fetch_array($result);
    $currentStatus = $row['completed'];

    // Toggle the completion status
    $newStatus = ($currentStatus == 1) ? 0 : 1;

    // Update the database
    $sqlUpdate = "UPDATE tasks SET completed = $newStatus WHERE id = $id";
    if (mysqli_query($conn, $sqlUpdate)) {
        header("Location: index.php");
    } else {
        die("Something went wrong in Database connection.");
    }
} else {
    echo "Task does not exist.";
}
?>
