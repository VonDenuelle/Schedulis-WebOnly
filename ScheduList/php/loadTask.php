<?php
require_once '../config/config.php';
session_start();
$rows =array();

$userid = $_SESSION['id'];
// gets result and parses to json
  $sql = "SELECT * FROM task_tbl WHERE userid = ? ORDER BY date DESC";
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
 ?>
