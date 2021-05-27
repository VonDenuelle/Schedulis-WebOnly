<?php
  session_start();
  session_unset();
  session_destroy();

require_once '../config/config.php';

  header("Location: /2nd_sprint/ScheduList(REVISED)");
  exit();
 ?>
