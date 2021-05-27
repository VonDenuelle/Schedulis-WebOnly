<?php
	$connection = mysql_connect("lcoalhost","root","");
	$db = mysql_select_db($connection, 'schedulist');

	if(isset($_POST['update'])){
		$taskid = $_POST["taskid"];
	    $taskdesc = $_POST["taskdesc"];
	    $date = $_POST["date"];
	    $time = $_POST["time"];

	    $query = "UPDATE task_tbl SET taskdesc='$taskdesc', date='$date', time='$time' WHERE taskid= '$taskid' ";
	    $query_run = mysql_query($connection, $query);

	    if ($query_run) {
    		echo '<script> alert("Data has been Updated"); </script>';
    		header("location: index.php")
	    }else{
	    	echo '<script> alert("Data has not been Updated"); </script>';
	    }
	}

?>