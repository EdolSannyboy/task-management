<?php
require 'config.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>View Tasks</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Tasks
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        session_start();
                        require 'config.php';
                        
                        if(isset($_POST['delete_task']))
                        {
                            $task_id = mysqli_real_escape_string($con, $_POST['delete_task']);
                        
                            $query = "DELETE FROM tasks WHERE id='$task_id' ";
                            $query_run = mysqli_query($con, $query);
                        
                            if($query_run)
                            {
                                $_SESSION['message'] = "Task Deleted Successfully!";
                                header("Location: index.php");
                                exit(0);
                            }
                            else
                            {
                                $_SESSION['message'] = "Task Not Deleted!";
                                header("Location: index.php");
                                exit(0);
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>