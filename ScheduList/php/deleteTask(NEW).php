<?php
	$connection = mysql_connect("lcoalhost","root","");
	$db = mysql_select_db($connection, 'schedulist');

	if(isset($_POST['deletedata'])){
		$taskid = $_POST["delete_ID"];


	    $query = "DELETE FROM task_tbl WHERE taskid= '$taskid'";
	    $query_run = mysql_query($connection, $query);

	    if ($query_run) {
    		echo '<script> alert("Data has been Deleted"); </script>';
    		header("location: index.php")
	    }else{
	    	echo '<script> alert("Data has not been Deleted"); </script>';
	    }
	}

?>