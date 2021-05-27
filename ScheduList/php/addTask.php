<?php
require_once '../config/config.php';
session_start();

    $task = $_POST["task"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $userid = $_SESSION["id"];

    if (empty($task) || empty($date) || empty($time)){
      $error[] = 'emptyfields';
      echo json_encode($error);
      exit();
    } else{

    $sql = "INSERT INTO task_tbl (taskdesc,date,time,userid) Values (?,?,?,?)";
      $stmt= mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
          exit();
        } else {
          mysqli_stmt_bind_param($stmt, "sssi", $task,$date,$time,$userid);
          mysqli_stmt_execute($stmt);
          $error[] = 'success';
          echo json_encode($error);
          exit();
                  }
    }



    mysqli_stmt_close($stmt);   //closes everything to save resource
    mysqli_close($conn);

 ?>
