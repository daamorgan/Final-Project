<!DOCTYPE html>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script src="no-refresh.js"> </script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="styling.css">
	</head>
	<body> 
		<div class="Container">
 			<div class="Top">
  				<h3> <i class="fa fa-bug" id="bugIcon"></i>BugMe Issue Tracker</h3>
 			</div>
 		<nav class="sides">
 			<ul>
     			<li onclick="showMain()"> <a href="#"><i class="fa fa-fw fa-home"></i>Home </a></li>
		        <br>
		        <li onclick="showCreateUser()"> <a href="#"><i class="fa fa-fw fa-plus"></i>Add User</a></li>
		        <br>
		        <li> <a href="CreateIssue.php"><i class="fa fa-fw fa-plus"></i>New Issue</a></li>
		        <br>
		        <li> <a href="Logout.php"> <i class="fa fa-power-off" id="powericon"></i>  Logout</a></li>
         	</ul>
 		</nav>
 		<?php /*
 	session_start();
 	$_SESSION["page"]='LoginPage';
 	$page=$_SESSION["page"].''.'php';
 	echo($page);*/?>
 	
 		
 		<div class="Main">
 					
 			</div>
 		</div>
 		
	</body 	
</html>
