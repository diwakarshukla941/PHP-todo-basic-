<?php

    include "db.php";

    if (isset($_GET['del_task'])) {
        $id = $_GET['del_task'];
        mysqli_query($db, "DELETE FROM tasks WHERE id= $id");
        header('location:index.php');
    }

 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>todo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="heading">
        <h2>todo app</h2>
    </div>
    <form action="index.php" method="POST">
        <?php
            if(isset($errors)){?>
        <p><?php echo $errors; ?></p>
        <?php } ?>
        <input type="text" name="task" class="task_input" >
        <button type="submit" class="add_btn" name="submit" >submit</button>
    </form>
    <table>
        <thead>
        <tr>
            <th>N</th>
            <th>Task</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            <?php
           $i=1; while ($row = mysqli_fetch_array($tasks)){ ?>
              <tr>
                <td><?php echo $i; ?> </td>
                <td><?php echo $row['task']; ?> </td>
                <td class="delete">
                    <a href="index.php?del_task=<?php echo $row['id']; ?>">x</a>
                </td>
            </tr>

           <?php $i++; } ?>
          
        </tbody>
    </table>
</body>
</html>