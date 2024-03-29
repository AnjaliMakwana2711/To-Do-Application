<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Task Details</title>
    <style>
        .task-details{
            background-color:#f5f5f5;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>Task Details</h1>
            <div>
                <a href="index.php" class="btn btn-primary">Back</a>
            </div>
        </header>

        <div class="task-details p-5 my-4">
            <?php
                include("connect.php");
                $id = $_GET['id'];
                if ($id) {
                    $sql = "SELECT * FROM tasks WHERE id = $id";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
            ?>
            
            <h3>Name:</h3>
            <p><?php echo $row["name"]; ?></p>
                 
            <h3>Assigner:</h3>
            <p><?php echo $row["assign"]; ?></p>
            
            <h3>Type:</h3>
            <p><?php echo $row["type"]; ?></p>
                 
            <h3>Description:</h3>
            <p><?php echo $row["description"]; ?></p>
                 
            <h3>Task Status:</h3>
            <p><?php echo ($row["completed"] == 1) ? 'Completed' : 'Incomplete'; ?></p>
                
            <?php
                    }
                }
                else{
                    echo "<h3>No tasks found</h3>";
                }
            ?>
            
        </div>
    </div>
</body>
</html>