<?php
$errors = "";
// connect to database
$db = mysqli_connect('localhost','root','','basictodo');

if(isset($_POST['submit'])){
    $task = $_POST['task'];
    if(empty($task)){
        $errors ="You must fill in the task";
    }
    else{
        mysqli_query($db, "INSERT INTO tasks (task) VALUES ('$task')");
        header('location: index.php');
    }
    // delete the task 
 
}
$tasks = mysqli_query($db, "SELECT * FROM tasks");
?>