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

	$uid_patents=$_SESSION['uid'];

if(isset($_POST['submit'])){
	
	$chars = "0123456789abcdefghijklmnopqrstuvwxyz";
    $patentsid = substr( str_shuffle( $chars ), 0, 7 );
	$patenttitle= $_POST['patent_title'];
	$patenttype= $_POST['Patent_type'];
	$Department= $_POST['Department'];
	$patentnumber= $_POST['Patent_number'];
	$obtainedorfiled= $_POST['obtainedorfiled'];
	$registery1= $_POST['registery'];
	$commercialization= $_POST['commercialization'];
	$commercializeddate= $_POST['commercialized_date'];
	$patentgrantyear= $_POST['Patentgrant_yr'];
	$amount= $_POST['amount'];
	$jointwithinst= $_POST['joint_with_inst'];

	$query_dupli = mysqli_query($conn, "SELECT * FROM patents WHERE patentsID='$patentsid'");

			if(mysqli_num_rows($query_dupli) > 0 ) { //check if there is already an entry for that username
				echo"<br>";
				echo "<font color=red size=4 >";
				echo"<center><b>";
				echo "Sorry fo the inconvenience, Please try again!";
				echo"</b></center>";
			}
			else{

					$allowed = mysqli_query($conn,"INSERT INTO `patents`(`Department`, `ObtainedORFile`, `Patent_Registered`, `Patent_Title`, `Patent_Type`, `Patent_Number`, `Patent_Grant_Year`, `Commercialized_or_Not`, `Commercialized_Date`, `Amount`, `Joint_with_inst`, `patentsID`, `UID`) VALUES ('$Department', '$obtainedorfiled', '$registery1', '$patenttitle', '$patenttype','$patentnumber', '$patentgrantyear', '$commercialization', '$commercializeddate', '$amount', '$jointwithinst', '$patentsid', '$uid_patents')" );

					echo "Data Saved!";
}	
}			
$conn->close();

error_reporting(0);
error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', 1);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Patents | R&D Department | Government College of Engineering, Amravati.</title>
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
		<div class="col-lg-12 m-auto d-block">
			
			
			<form action="" method="post" class="form-control z-depth-4" onsubmit="return validation()">
				<div style="padding-top: 20px;"></div>
				<h4 class="font-weight-bold"> Patents</h4>

				<div class="row">

				<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label for="Appointed as" class="font-weight-bold"> Patent Title: </label>
					<input type="text" name="patent_title" class="form-control" id="pat_title" autocomplete="off">
					<span id="patenttitle_span" class="text-danger"> </span>
				</div>
				<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label class="font-weight-bold">Patent Type:</label>
                    <select class="form-control" id="sel2" name="Patent_type">
                    <option value="Product Based" value="">Select Patent type</option>
                    <option value="Product Based" value="Product Based">Product Based</option>
    				<option value="Process Based" value="Process Based">Process Based</option>
  					</select>
				</div>
				</div>
				<div class="row">
				<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label class="font-weight-bold">Department :</label>
                    <select class="form-control" id="sel1" name="Department">
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

				<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label for="patent_no" class="font-weight-bold">  Patent Number: </label>
					<input type="text" class="form-control" id="pat_no" name="Patent_number" autocomplete="off">
					<span id="patent_number" class="text-danger"> </span>
				</div>
				</div>
				<div class="row">
				<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label class="font-weight-bold"> Patent Status:</label>
					<div class="radio">
                        <label><input type="radio" name="obtainedorfiled" id="obt" value="filed">Filed</label>
                     </div>
                     <div class="radio">
                    <label><input type="radio" name="obtainedorfiled" id="obt" value="awarded">Awarded</label>
                     </div>
                   <div class="radio">
                        <label><input type="radio" name="obtainedorfiled" id="obt" value="obtained">Obtained</label>
                     </div>
				</div>
				<span id="patenttype" class="text-danger"> </span>
				
				<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label class="font-weight-bold"> Nationally/Internationally Commercialized?  </label>
					<div class="radio">
                    <label><input type="radio" name="commercialization" id="comm" value="Yes">Yes</label>
                     </div>
                   <div class="radio">
                        <label><input type="radio" name="commercialization" id="comm" value="No">No</label>
                     </div>
				</div>
				</div>

				<div class="row">
				<span id="comm" class="text-danger"> </span>
				<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label class="font-weight-bold"> Commercialized date : </label><br>
					<input type="date" name="commercialized_date" id="date">
					<br><label class="text-primary text-center"> If exact date is unknown, enter the date 1 of that month with corresponding year.</label><br>
					<span id="dates" class="text-danger"> </span>
				</div>
				
                 
				<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label for="patentgrant_yr" class="font-weight-bold">  Patent Grant Date/Year: </label><br>
					<input type="date" id="pg_yr" name="Patentgrant_yr" >
					<br><label class="text-primary text-center"> If only year is known to you then please enter 1 january of the corresponding year</label><br>
					<span id="patentgrantyear" class="text-danger"> </span>
				</div>
</div>				
<div class="row">
				<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label for="inv" class="font-weight-bold"> Amount : </label>
					<input type="text" name="amount" class="form-control" id="amt" autocomplete="off">
					<span id="amount_span" class="text-danger"> </span>
				</div>
				
				<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label class="font-weight-bold">Whether joint with any institute :</label>
                    <select class="form-control" id="sel2" name="joint_with_inst">
                    <option value="">Select Option</option>
                    <option value="Academic institute">Academic Institute</option>
    				<option value="R&D Institute">R&D Institute</option>
    				<option value="Other">Other</option>
    				</select>
				</div>
					<span id="joint" class="text-danger"></span>
				</div>
</div>

				<center><input type="submit" name="submit" value="Save" class="btn btn-info" autocomplete="off"></center>
				<div style="padding-top: 40px;"></div>

				</form>

<!--JAVASCRIPT-->
	<script type="text/javascript">
		

		function validation(){

			var pat_title = document.getElementById('pat_title').value;
			var pat_no = document.getElementById('pat_no').value;
			var date = document.getElementById('date').value;
            var patentgrantyr = document.getElementById('pg_yr').value;
            var amount = document.getElementById('amt').value;



			if(pat_title == ""){
				document.getElementById('patenttitle_span').innerHTML =" **Please fill the patent title field";
				return false;
			}
			


			if(pat_no == ""){
				document.getElementById('patent_number').innerHTML =" **Please fill the Patent Number field with 6, 7 or 8 digits ONLY";
				return false;
			}
			if(isNaN(pat_no)){
				document.getElementById('patent_number').innerHTML =" **Only Digits are allowed";
				return false;
			}


			if(date == ""){
				document.getElementById('dates').innerHTML =" **Please enter a valid date";
				return false;
			}

		

			if(patentgrantyr == ""){
				document.getElementById('patentgrantyear').innerHTML =" **Please fill the patent grant year field";
				return false;
			}
			
			if(isNaN(amount)){
				document.getElementById('amount_span').innerHTML =" **Enter the amount field(in digits) ";
				return false;
			}
		}
	</script>

<!--JAVASCRIPT-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>



