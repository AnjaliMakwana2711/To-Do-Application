<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Task List</title>
    <style>
        table  td, table th{
        vertical-align:middle;
        text-align:right;
        padding:20px!important;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>Task List</h1>
            <div>
                <a href="create.php" class="btn btn-primary">Add New Task</a>
            </div>
        </header>
        
        <?php
            session_start();
            if (isset($_SESSION["create"])) {
        ?>

        <div class="alert alert-success">
            <?php 
                echo $_SESSION["create"];
                unset($_SESSION["create"]);
            ?>
        </div>

        <?php
            }
        ?>
        
        <?php
            if (isset($_SESSION["update"])) {
        ?>

        <div class="alert alert-success">
            <?php 
                echo $_SESSION["update"];
                unset($_SESSION["update"]);
            ?>
        </div>

        <?php
            }
        ?>

        <?php
            if (isset($_SESSION["delete"])) {
        ?>
        
        <div class="alert alert-success">
            <?php 
                echo $_SESSION["delete"];
                unset($_SESSION["delete"]);
            ?>
        </div>

        <?php
            }
        ?>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Task Name</th>
                    <th>Task Assigner</th>
                    <th>Task Type</th>
                    <th>Actions</th>
                    <th>Task Completed</th>
                </tr>
            </thead>

            <tbody>

                <?php
                    include('connect.php');
                    $sqlSelect = "SELECT * FROM tasks";
                    $result = mysqli_query($conn,$sqlSelect);
                    while($data = mysqli_fetch_array($result)){
                ?>
            
                <tr>
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['assign']; ?></td>
                    <td><?php echo $data['type']; ?></td>
                    <td>
                        <a href="view.php?id=<?php echo $data['id']; ?>" class="btn btn-info">Read More</a>
                        <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                    <td>
                        <a href="completion.php?id=<?php echo $data['id']; ?>" class="btn btn-success">
                            <?php echo ($data['completed'] == 1) ? 'Mark Incomplete' : 'Mark Complete'; ?>
                        </a>
                    </td>
                </tr>
                
                <?php
                    }
                ?>
        
            </tbody>
        </table>
    </div>
</body>
</html>