<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "r&d";
$uid=$_SESSION['uid'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}                                    

if(isset($_POST['submit'])){
	
	$chars = "0123456789abcdefghijklmnopqrstuvwxyz";
    $workshopid = substr( str_shuffle( $chars ), 0, 7 );
	$subjectofworkshop= $_POST['subject_of_workshop'];
	$department= $_POST['department'];
	$broadarea= $_POST['broad_area'];
	$datefrom= $_POST['date_from'];
	$dateto= $_POST['date_to'];
	$noofparticipants= $_POST['no_of_participants'];
	$teqip= $_POST['teqip'];
	$amount= $_POST['amount'];
	$description= $_POST['description'];

	$query_dupl = mysqli_query($conn, "SELECT * FROM workshops WHERE workshopID='$workshopid'");

			if(mysqli_num_rows($query_dupl) > 0 ) {
				echo"<br>";
				echo "<font color=red size=4 >";
				echo"<center><b>";
				echo "Sorry fo the inconvenience, Please try again!";
				echo"</b></center>";
			}
			else{

					$allowed = mysqli_query($conn,"INSERT INTO workshops (Title, Department, Broad_area, Date_from, Date_to, 
					No_of_participants, Under_TEQIP_or_Not, Amount, Desciption, workshopID, UID)
					VALUES ('$subjectofworkshop', '$department', '$broadarea','$datefrom','$dateto','$noofparticipants'
					,'$teqip','$amount','$description', '$workshopid', '$uid')");

					echo "Data Saved!";
}
}

$conn->close();
?>




<!DOCTYPE html>
<html>
<head>
	<title>Workshops | R&D Department | Government College of Engineering, Amravati.</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.6.0/css/mdb.min.css" rel="stylesheet">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.6.0/js/mdb.min.js"></script>
</head>
<body>		
		<div class="col-lg-9 m-auto d-block">
			
			
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" class="form-control z-depth-4" onsubmit="return validation()">
				<div style="padding-top: 20px;"></div>
                 <h4 class="font-weight-bold"> Workshops</h4>
<div class="row">
				 <div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label for="sub" class="font-weight-bold">Subject of Workshop: </label>
					<input type="text" name="subject_of_workshop" class="form-control" id="wor_sub" autocomplete="off">
					<span id="workshop_subject" class="text-danger"> </span>
				</div>
				
			       <div class="form-group col-lg-6 col-md-6 col-xs-6">
				
					<label class="font-weight-bold">Department of Research Work:</label>
                    <select class="form-control" id="sel1" name="department">
                    <option value="">Select Department</option>
                    <option value="Computer Science And Engineering">Computer Science And Engineering</option>
    				<option value="Information Technology">Information Technology</option>
    				<option value="Instrumentation Engineering">Instrumentation Engineering</option>
    				<option value="Electronics And Telecommunication Engineering">Electronics And Telecommunication Engineering</option>
    				<option value="Electrical Engineering">Electrical Engineering</option>
    				<option value="Civil Engineering">Civil Engineering</option>
    				<option value="Mechanical Engineering">Mechanical Engineering</option>
					<option value="Applied Mechanics">Applied Mechanics</option>
    				<option value="Applied Physics">Applied Physics</option>
    				<option value="Applied Chemistry">Applied Chemistry</option>
					<option value="Engineering mathematics">Engineering mathematics</option>
  					</select>
				</div>
					<span id="work" class="text-danger"></span>
</div>
<div class="row">

					<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label for="broadarea" class="font-weight-bold">Broad Area : </label>
					<input type="text" name="broad_area" class="form-control" id="b_area" autocomplete="off">
					<span id="broadarea_span" class="text-danger"> </span>
				</div>
                <div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label class="font-weight-bold"> Date from: </label>
					<input type="date" name="date_from" id="date1">
					<br><label class="text-danger text-center"> If exact date is unknown, enter the date 1 of that month with corresponding year.</label><br>
					<span id="dates1" class="text-danger"> </span>
				</div>
</div>
<div class="row">

				<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label class="font-weight-bold"> Date to: </label><br>
					<input type="date" name="date_to" id="date2">
					<br><label class="text-danger text-center"> If exact date is unknown, enter the date 1 of that month with corresponding year.</label><br>
					<span id="dates2" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label for="part_num" class="font-weight-bold">  Number of participants : </label>
					<input type="text" name="no_of_participants" class="form-control col-lg-3 col-md-3 col-xs-3" id="parti_num" autocomplete="off">
					<span id="participant_number" class="text-danger"> </span>
				</div>
					<span id="work" class="text-danger"></span>
</div>
<div class="row">

					<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label class="font-weight-bold"> Workshop under TEQIP?  </label>
					<div class="radio">
                    <label><input type="radio" name="teqip" value="Yes" >Yes</label>
                     </div>
                   <div class="radio">
                        <label><input type="radio" name="teqip" value="No">No</label>
                     </div>
				</div>
				<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label for="amount" class="font-weight-bold">  Amount : </label>
					<input type="text" name="amount" class="form-control col-lg-3 col-md-3 col-xs-3" id="amt" autocomplete="off">
					<span id="amount_span" class="text-danger"> </span>
				</div>
</div>
<div class="row">

				<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label class="font-weight-bold"> Workshop Description in short : </label>
					<textarea class="form-control" id="desc" rows="5" autocomplete="off" name="description"></textarea>
					<span id="res_add" class="text-danger"> </span>
				</div>
</div>

				<center><input type="submit" name="submit" value="Save" class="btn btn-info" autocomplete="off"></center>
				<div style="padding-top: 20px;"></div>
				</form>
		</div>

<!--JAVASCRIPT-->
	<script type="text/javascript">
		

		function validation(){

			var wor_sub = document.getElementById('wor_sub').value;
			var date1 = document.getElementById('date1').value;
			var date2 = document.getElementById('date2').value;
			var parti_num = document.getElementById('parti_num').value;
			var address = document.getElementById('desc').value;
			var amt = document.getElementById('amt').value;




			if(wor_sub == ""){
				document.getElementById('workshop_subject').innerHTML ="**Please fill the Subject of Workshop field";
				return false;
			}
			if(!isNaN(wor_sub)){
				document.getElementById('workshop_subject').innerHTML ="**Only characters are allowed";
				return false;
			}


			if(date1 == ""){
				document.getElementById('dates1').innerHTML =" ** Please enter a valid date";
				return false;
			}

			if(date2 == ""){
				document.getElementById('dates2').innerHTML =" ** Please enter a valid date";
				return false;
			}

			if(isNaN(parti_num)){
				document.getElementById('participant_number').innerHTML =" **User must enter digits only";
				return false;
			}

			if(isNaN(amt)){
				document.getElementById('amount_span').innerHTML =" **User must enter digits only";
				return false;
			}

			if(address == ""){
				document.getElementById('res_add').innerHTML ="**Please enter the description of workshop";
				return false;
			}
		}
	</script>

<!--JAVASCRIPT-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
