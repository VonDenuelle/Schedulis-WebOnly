<?php
require_once '../config/config.php';
session_start();
$taskid = $_POST["taskid"];
$userid = $_SESSION["id"];
//delete with tabid
$sql = 'DELETE FROM task_tbl WHERE taskid=? AND userid=?';
$stmt= mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "ii", $taskid, $userid);
    mysqli_stmt_execute($stmt);
  }
 ?>
