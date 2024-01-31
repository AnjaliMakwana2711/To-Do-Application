<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Add New Task</title>
</head> 
<body>
    <div class="container my-5">
        <header class="d-flex justify-content-between my-4">
            <h1>Add New Task</h1>
            <div>
                <a href="index.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        
        <form action="process.php" method="post">
            <div class="form-element my-4">
                <input type="text" class="form-control" name="name" placeholder="Task Name:">
            </div>

            <div class="form-element my-4">
                <input type="text" class="form-control" name="assign" placeholder="Task Assigner:">
            </div>

            <div class="form-element my-4">
                <select name="type" class="form-control">
                    <option value="">Select Task Type:</option>
                    <option value="Easy">Easy</option>
                    <option value="Medium">Medium</option>
                    <option value="Advance">Advance</option>
                </select>
            </div>

            <div class="form-element my-4">
                <textarea name="description" class="form-control" placeholder="Task Description:"></textarea>
            </div>

            <div class="form-element my-4">
                <input type="submit" name="create" value="Add Task" class="btn btn-success">
            </div>
        </form>
        
    </div>
</body>
</html>