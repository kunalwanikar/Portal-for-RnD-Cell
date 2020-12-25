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

$uid_innovation = $_SESSION['uid'];

if(isset($_POST['submit'])){
		$chars = "0123456789abcdefghijklmnopqrstuvwxyz";
    	$innovationid = substr( str_shuffle( $chars ), 0, 7 );
        $innovationtitle= $_POST['Innovation_title'];
		$department= $_POST['department'];
		$transfer= $_POST['transfer'];
		$transferdate= $_POST['transfer_date'];
		$organizationname= $_POST['organization_name'];
		$innovationdate= $_POST['innov_date']; 
		$innovationcomm= $_POST['innov_comm'];
		$innovationtype= $_POST['Innovation_type'];
		$commercialization= $_POST['commercialization'];
		$amount= $_POST['Amount'];

		$query_dupl = mysqli_query($conn, "SELECT * FROM innovations WHERE innovationID='$innovationid'");

			if(mysqli_num_rows($query_dupl) > 0 ) { //check if there is already an entry for that username
				echo"<br>";
				echo "<font color=red size=4 >";
				echo"<center><b>";
				echo "Sorry fo the inconvenience, Please try again!";
				echo"</b></center>";
			}
			else{
		
          $allowed = mysqli_query($conn,"INSERT INTO `innovations`(`Innovation_title`, `Department`, `Innovation_date`, `ProductORprocess`, `TechnologyTransfer`, `Transfer_Date`, `Org_name`, `Commercialized_orNot`, `Amount`, `Commercialized_Date`, `innovationID`, `UID`) VALUES ('$innovationtitle', '$department','$innovationdate','$innovationtype', '$transfer', '$transferdate', '$organizationname', '$commercialization', '$amount', '$innovationcomm', '$innovationid', '$uid_innovation')");

          echo "Data Saved!";
}
}


$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Innovations | R&D Department | Government College of Engineering, Amravati.</title>
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
			<form action="" method="post" class="form-control z-depth-4" onsubmit="return validation()">
<h4 class="font-weight-bold"> Innovations</h4>
<div class="row">
				<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label for="inno" class="font-weight-bold">Innovation Title: </label>
					<input type="text" name="Innovation_title" class="form-control" id="inno_title" autocomplete="off">
					<span id="innovation_title" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label class="font-weight-bold">Department:</label>
                    <select class="form-control" id="select_1" name="department">
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
					<span id="dept" class="text-danger"></span>
</div>
<div class="row">
					<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label class="font-weight-bold">Role:</label>
                    <select class="form-control" id="select_2" name="Innovation_type">
                    <option value="">Select Your role</option>
                    <option value="Product Based">Self made innovation</option>
    				<option value="Process Based">Worked as a Guide</option>
  					</select>
  				</div>

					<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label class="font-weight-bold"> Technology Transferred to any Organization/Industry/Client? </label>
					<div class="radio">
                    <label><input type="radio" name="transfer" id="techtransfer" value="Yes"> Yes </label>
                     </div>
                   <div class="radio">
                        <label><input type="radio" name="transfer" id="techtransfer" value="No"> No </label>
                     </div>
				</div>
				<span id="transfer" class="text-danger"> </span>
</div>
<div class="row">

				<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label class="font-weight-bold"> Transfer date : </label><br>
					<input type="date" name="transfer_date" id="date1">
					<br><label class="text-danger text-center"> If exact date is unknown, enter the date 1 of that month with corresponding year.</label>
					<br><span id="dates1" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label for="org" class="font-weight-bold"> Name of Organization/Industry/Client (transfered to) : </label>
					<input type="text" class="form-control" id="organinz_name" name="organization_name" autocomplete="off">
					<span id="org_name" class="text-danger"> </span>
				</div>
</div>
<div class="row">		
				<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label class="font-weight-bold"> Date of Innovation : </label><br>  
					<input type="date" name="innov_date">
				</div>

				<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label class="font-weight-bold">Innovation Type:</label>
                    <select class="form-control" id="select_2" name="Innovation_type">
                    <option value="">Select Innovation Type</option>
                    <option value="Product Based">Product Based</option>
    				<option value="Process Based">Process Based</option>
  					</select>
				</div>
					<span id="select2_span" class="text-danger"></span>

</div>
<div class="row">
				<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label class="font-weight-bold"> Nationally/Internationally Commercialized?  </label>
					<div class="radio">
                    <label><input type="radio" name="commercialization" id="comm" value="Yes">Yes</label>
                     </div>
                   <div class="radio">
                        <label><input type="radio" name="commercialization" id="comm" value="No">No</label>
                     </div>
				</div>
				<span id="comm" class="text-danger"> </span>

				<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label for="inv" class="font-weight-bold"> Amount(INR): </label>
					<input type="text"  class="form-control" id="amt" autocomplete="off" name="Amount">
					<span id="amount" class="text-danger"> </span>
				</div>

</div>
<div class="row">				
				<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label class="font-weight-bold"> Date of Commercialization : </label><br>  
					<input type="date" name="innov_comm">
				</div>
</div>

				<center><input type="submit" name="submit" value="Save" class="btn btn-info" autocomplete="off"></center>
				<div style="padding-top: 40px;"></div>

				</form>
		</div>

<!--JAVASCRIPT-->
	<script type="text/javascript">
		

		function validation(){

			var inno_title = document.getElementById('inno_title').value;
			var organinz_name = document.getElementById('organinz_name').value;
			var amt = document.getElementById('amt').value;
			var date1 = document.getElementById('date1').value;
			var date2 = document.getElementById('date2').value;
			var date3 = document.getElementById('date3').value;





			if(inno_title == ""){
				document.getElementById('Innovation_title').innerHTML =" **Please fill the patent title field";
				return false;
			}
			if((inno_title.length <= 2) || (inno_title.length > 50)) {
				document.getElementById('Innovation_title').innerHTML =" **Lenght must be between 2 and 50";
				return false;	
			}


			if(date1 == ""){
				document.getElementById('dates').innerHTML =" **Please enter a valid date";
				return false;
			}


			if(organinz_name == ""){
				document.getElementById('patent_number').innerHTML =" **Please fill the Patent Number field with 6, 7 or 8 digits ONLY";
				return false;
			}
			if(!isNaN(organinz_name)){
				document.getElementById('patent_number').innerHTML =" **Only Digits are allowed";
				return false;
			}


			if(date2 == ""){
				document.getElementById('dates').innerHTML =" **Please enter a valid date";
				return false;
			}

		

			if(amt == ""){
				document.getElementById('amount').innerHTML =" **Please fill the Investment field (Enter 0 if not Funded)";
				return false;
			}
			if(isNaN(amt)){
				document.getElementById('amount').innerHTML =" **Enter the Investment Amount(in digits) ";
				return false;
			}


			if(date3 == ""){
				document.getElementById('dates').innerHTML =" **Please enter a valid date";
				return false;
			}
		}
	</script>
	<script>
	
	

</script>


<!--JAVASCRIPT-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>


</body>
</html>