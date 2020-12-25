<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "r&d";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "SELECT * FROM administrative_work where UID = '".$_SESSION['uid']."'";
                                   

$result = $conn->query($sql);

if(isset($_POST['submit'])){
	
    $admin_work= $_POST['admin_Work'];

 
                    $allowed = mysqli_query($conn,"INSERT INTO administrative_work(Work_Description)
					VALUES ('$admin_work')");
}
$conn->close();
?>
<!--PHP Database Connection Ends-->


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.6.1/css/mdb.min.css" rel="stylesheet">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>		
		<div class="col-lg-12 m-auto d-block">
			
			<form method="post" class="form-control z-depth-4" onsubmit="return validation()">

					<center><h4 class="font-weight-bold"> Administrative Work</h4></center><br>

					<div class="form-group col-lg-10 col-md-10 col-xs-10">
					<label for="sub" class="font-weight-bold">Role: </label>
					<input type="text" name="subject_of_conference" class="form-control" id="con_sub" autocomplete="off">
					<span id="conference_subject" class="text-danger"> </span>
					</div>


				<div class="form-group col-lg-10 col-md-10 col-xs-10">
					<label class="font-weight-bold"> Date from : </label><br>
					<input type="date" name="date_from" id="date1">
					<br><label class="text-primary text-center"> If exact date is unknown, enter the date 1 of that month with corresponding year.</label><br>
					<span id="dates1" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-10 col-md-10 col-xs-10">
					<label class="font-weight-bold"> Date to   : </label><br>
					<input type="date" name="date_to" id="date2">
					<br><label class="text-primary text-center"> If exact date is unknown, enter the date 1 of that month with corresponding year.</label><br>
					<span id="dates2" class="text-danger"> </span>
				</div>

 					<div class="form-group">
					<label for="work" class="font-weight-bold"> Administrative Work Description: </label>
					<textarea name="admin_Work" class="form-control" id="admin_work" rows="5" autocomplete="off"  ></textarea>
					<span id="work_desc" class="text-danger"> </span>
					</div>

				<center><input type="submit" name="submit" value="submit" class="btn btn-info" autocomplete="off"></center>
				<div style="padding-top: 20px;"></div>


			</form><br><br>


		</div>
	</div>


	<script type="text/javascript">
		

		function validation(){

			var admin_work = document.getElementById('admin_work').value;


			if(admin_work == ""){
				document.getElementById('work_desc').innerHTML =" **Please enter work description in details";
				return false;
			}
		}

	</script>

</body>
</html>