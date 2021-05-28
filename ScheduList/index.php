<?php
session_start();
if (!isset($_SESSION['id'])) {
  header("Location: /Main/ScheduList/LogIn");
}
?>

<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script type="text/javascript" src="js/script.js"></script>
    <title>ScheduList</title>
  </head>
  <body>
    <div class="row">

      <!--SIDEBAR-->
      <div class="col-1 ml-0">
        <div class="navigation">
          <ul>
            <center><img class="logo" src="imgs/logo2.png"><br><br><br><br></center>
            <li>
              <a href="#">
                <span class="icon"><i class="far fa-user"></i></span>
                <span class="title">Profile</span>
              </a>
            </li>
            <li>
              <a href="#">
                <span class="icon"><i class="fas fa-info-circle"></i></span>
                <span class="title">About</span>
              </a>
            </li>
            <li>
              <a href="php/logout">
                <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                <span class="title">Log out</span>
              </a>
            </li>
          </ul>
        </div>
      </div>

    <!-- **************************************************************************************************************** -->
      <!-- NOTIFICATION-->
      <div class="col-11 main custom notif">
        <div class="cust-notif p-5">
          <div class="title-cust">
            <h1>Latest Appointment/Task</h1>
          </div>
          <div class="body-cust">
            <h3>No incoming schedule</h3>
            <p>Add a task below</p>
          </div>
      </div>


<div class="tbl col-12 main p-3">
    <h1>My Schedule</h1>
    <hr>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Task Desciption</th>
				<th>Date Scheduled</th>
				<th>Time Scheduled</th>
				<th>Edit</th>
			</tr>
		</thead>
		<tbody>

		</tbody>
	</table>
  <hr>
  <button type="button" class="btn btn-primary add" id="addtask" >+ Add New</button>

</div>

    <!-- **************************************************************************************************************** -->
    <!-- Modal  for editing tasks-->
    <div class="edittask-notif">
      <div class="edittask-content">
        <form id="edittask">
          <div class="modal-body">

            <!-- form -->
            <div class="mb-3 q">
                <label for="task" class="form-label">Appointment/Task</label>
                <textarea class="form-control" id="taskedit" rows="3"></textarea>
            </div>
            <div class="mb-3 q ">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control"  id="dateedit" placeholder="Date">
            </div>
            <div class="mb-3 q">
                <label for="time" class="form-label">Time</label>
                <input type="time" class="form-control" id="timeedit" placeholder="Time">
            </div>
            <h4 id="error"></h4>

          </div><!--./modal-body-->

          <div class="modal-footer">
            <input type="submit" class="btn btn-primary"  value="Update"></input>
            <input type="button" class="btn btn-secondary" id="closeedit"value="Close"></button>
          </div>
        </form>
      </div>
    </div>

    <!-- **************************************************************************************************************** -->
    <!-- Modal  for adding tasks-->
    <div class="addtask-notif">
      <div class="addtask-content">
        <form id="addTask">
          <div class="modal-body">

            <!-- form -->
            <div class="mb-3 q">
                <label for="task" class="form-label">Appointment/Task</label>
                <textarea class="form-control" id="task" rows="3"></textarea>
            </div>
            <div class="mb-3 q ">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control"  id="date" placeholder="Date">
            </div>
            <div class="mb-3 q">
                <label for="time" class="form-label">Time</label>
                <input type="time" class="form-control" id="time" placeholder="Time">
            </div>
            <h4 id="error"></h4>

          </div><!--./modal-body-->

          <div class="modal-footer">
            <input type="submit" class="btn btn-primary"  value="Submit"></input>
            <input type="button" class="btn btn-secondary" id="close"value="Close"></button>
          </div>
        </form>
      </div>
    </div>

    <!-- Modal for Notification -->
    <div class="container-notif">
      <div class="notif-content" id="notif-content">
        <p>Your schedule is Up! Click dismiss to stop the alarm</p>
        <button class="accept" id="stop">Dismiss</button>
      </div>
    </div>

    <!--ICON SCRIPTS-->
    <script src="https://kit.fontawesome.com/abb3e9b2a6.js" crossorigin="anonymous"></script>
        <!-- JS Scripts for ajax (jquery) -->




    <!--BOOTSTRAP SCRIPTS-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  </body>
</html>
