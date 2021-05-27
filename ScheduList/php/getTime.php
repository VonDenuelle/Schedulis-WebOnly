<?php
require_once '../config/config.php';
session_start();
date_default_timezone_set("Asia/Singapore");
 $date = date("Y-m-d");
 $time =  date("'H:i:00'");

$userid = $_SESSION['id'];
$rows = array();

$sql = "SELECT taskdesc, time , date FROM task_tbl WHERE userid= ? AND date = CURRENT_DATE AND time >= $time ORDER BY date DESC ,time ASC LIMIT 1";
  $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      exit();
        } else {
          mysqli_stmt_bind_param($stmt, "i", $userid);
          mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt); //gets result from stmt to $result

        if (mysqli_num_rows($result) < 1) {
          //remake sql for future dates
          $sql = "SELECT taskdesc, time , date FROM task_tbl WHERE userid=? AND date > CURRENT_DATE ORDER BY date DESC ,time ASC LIMIT 1";
            $stmt= mysqli_stmt_init($conn);
              if (!mysqli_stmt_prepare($stmt, $sql)) {
                exit();
                  } else {
                    mysqli_stmt_bind_param($stmt, "i", $userid);
                    mysqli_stmt_execute($stmt);

                  $result = mysqli_stmt_get_result($stmt); //gets result from stmt to $result
                    while ($row = mysqli_fetch_assoc($result)) {
                         $rows[]= $row;
                       }
                      echo json_encode($rows);
                          exit();
                    }
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                 $rows[]= $row;
            }
            // array_push($rows, "available")
           echo json_encode($rows);
               exit();
          }
        }


 ?>
