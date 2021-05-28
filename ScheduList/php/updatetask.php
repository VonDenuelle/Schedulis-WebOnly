<?php
require_once '../config/config.php';
session_start();

$taskid = $_POST["taskid"];
$userid = $_SESSION["id"];
$taskdesc = $_POST['taskdesc'];
$time = $_POST['time'];
$date = $_POST['date'];

    if (empty($taskdesc) || empty($date) || empty($time)){
      $error = 'emptyfields';
      echo json_encode($error);
      exit();
    } else{
			$sql = "UPDATE task_tbl SET taskdesc=?, date=?, time=? WHERE taskid=? AND userid=?";
			$stmt= mysqli_stmt_init($conn);

				if (!mysqli_stmt_prepare($stmt, $sql)) {
					exit();
				} else {
					mysqli_stmt_bind_param($stmt, "sssii", $taskdesc,$date,$time,$taskid,$userid);
					mysqli_stmt_execute($stmt);
					$error= ['success'];
					echo json_encode($error);
					exit();
				}
		}


		    mysqli_stmt_close($stmt);   //closes everything to save resource
		    mysqli_close($conn);

 ?>
