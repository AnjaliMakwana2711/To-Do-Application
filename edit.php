<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Edit Task</title>
</head>
<body>
    <div class="container my-5">
        <header class="d-flex justify-content-between my-4">
            <h1>Edit Task</h1>
            <div>
                <a href="index.php" class="btn btn-primary">Back</a>
            </div>
        </header>

        <form action="process.php" method="post">
            <?php 
                include("connect.php");
                if (isset($_GET['id'])) {       
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM tasks WHERE id=$id";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($result);
            ?>
            
            <div class="form-element my-4">
                <input type="text" class="form-control" name="name" placeholder="Task Name:" value="<?php echo $row["name"]; ?>">
            </div>

            <div class="form-element my-4">
                <input type="text" class="form-control" name="assign" placeholder="Task Assigner:" value="<?php echo $row["assign"]; ?>">
            </div>

            <div class="form-element my-4">
                <select name="type" class="form-control">
                    <option value="">Select Task Type:</option>
                    <option value="Easy" <?php if($row["type"]=="Easy"){echo "selected";} ?>>Easy</option>
                    <option value="Medium" <?php if($row["type"]=="Medium"){echo "selected";} ?>>Medium</option>
                    <option value="Advance" <?php if($row["type"]=="Advance"){echo "selected";} ?>>Advance</option>
                </select>
            </div>

            <div class="form-element my-4">
                <textarea name="description" class="form-control" placeholder="Task Description:"><?php echo $row["description"]; ?></textarea>
            </div>

            <input type="hidden" value="<?php echo $id; ?>" name="id">

            <div class="form-element my-4">
                <input type="submit" name="edit" value="Edit Task" class="btn btn-primary">
            </div>

            <?php
                }
                else{
                    echo "<h3>Task Does Not Exist</h3>";
                }
            ?>
           
        </form>
        
        
    </div>
</body>
</html>