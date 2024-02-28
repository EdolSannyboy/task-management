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

if(isset($_POST['update_task']))
{
    $task_id = mysqli_real_escape_string($con, $_POST['task_id']);

    $title = mysqli_real_escape_string($con, $_POST['title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $priority = mysqli_real_escape_string($con, $_POST['priority']);
    $due_date = mysqli_real_escape_string($con, $_POST['due_date']);

    $query = "UPDATE tasks SET title='$title', description='$description', priority='$priority', due_date='$due_date' WHERE id='$task_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Task Updated Successfully!";
        header("Location: edit_task.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Task Not Updated!";
        header("Location: edit_task.php");
        exit(0);
    }

}


if(isset($_POST['save_task']))
{
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $priority = mysqli_real_escape_string($con, $_POST['priority']);
    $due_date = mysqli_real_escape_string($con, $_POST['due_date']);

    $query = "INSERT INTO tasks (title,description,priority,due_date) VALUES ('$title','$description','$priority','$due_date')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Student Created Successfully!";
        header("Location: create_task.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Created!";
        header("Location: crud.php");
        exit(0);
    }
}

?>