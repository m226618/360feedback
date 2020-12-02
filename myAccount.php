<?php
  session_start();
  if(empty($_SESSION["user"]) && !isset($_SESSION["user"]))
  header("Location: welcome.html");
 ?>
 <!DOCTYPE html>

<html>
<head lang="en"><meta charset = "utf-8">
  <title>My Account</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body class="text-dark text-center">
	<div class="jumbotron">
		<div class="display-4">360 Feedback - Home</div>
		<br>
		<ul class="nav nav-pills justify-content-center">
			<li class="nav-item">
				<a class="nav-link active" href="myAccount.php">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="getFeedback.php">Get Feedback</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="submitFeedback.php">Submit Feedback</a>
			</li>
			<?php
			if(!(empty($_SESSION["admin"]) && !isset($_SESSION["admin"]))){
			?>
			<li class="nav-item">
				<a class="nav-link" href="stats.php">Feedback Statistics</a>
			</li>
			<?php
			}
			?>
			<li class="nav-item">
				<a class="nav-link" href="logout.php">Logout</a>
			</li>
		</ul>
	</div>
	<!-- <div class="container">
		<div class="row text-center">
			<div class="col">
				<div class="jumbotron">
					<h4>View Feedback</h4>
					<a href="getFeedback.php" class="btn btn-primary btn-block" role="button">Click Here</a>
				</div>
			</div>
			<div class="col">
				<div class="jumbotron">
					<h4>Submit Feedback</h4>
					<a href="submitFeedback.php" class="btn btn-primary btn-block" role="button">Click Here</a>
				</div>
			</div>
			<div class="col">
				<div class="jumbotron">
					<h4>Feedback Statistics</h4>
					<a href="stats.php" class="btn btn-primary btn-block" role="button">Click Here</a>
				</div>
			</div>
		</div>
		<div class="row text-center">
			<div class="col">
				<div class="jumbotron bg-white">
					<a href="logout.php" class="btn btn-primary btn-large" role="button">Logout</a>
				</div>
			</div>
		</div>
	</div> -->
	<div class="container">
		<div class="row justify-content-center">
			<div class="col">
				<div class="jumbotron">
					<h4>Click one of the following to proceed</h4>
					<a href="getFeedback.php" class="btn btn-primary btn-block" role="button">View Feedback</a>
					<a href="submitFeedback.php" class="btn btn-primary btn-block" role="button">Submit Feedback</a>
					<?php
					if(!(empty($_SESSION["admin"]) && !isset($_SESSION["admin"]))){
					?>
					<a href="stats.php" class="btn btn-primary btn-block" role="button">Feedback Statistics</a>
					<?php
					}
					?>
					<a href="logout.php" class="btn btn-primary btn-block" role="button">Logout</a>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>

