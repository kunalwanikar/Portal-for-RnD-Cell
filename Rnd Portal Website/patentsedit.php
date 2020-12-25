<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "r&d";
$uid = $_SESSION['uid'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM patents where UID = '$uid' AND patentsID = '".$_GET['id']."' ";
                                   

$res = $conn->query($sql);

while($rowval = $res->fetch_assoc()) {

	$patenttitle= $rowval['Patent_Title'];
	$patenttype= $rowval['Patent_Type'];
	$Department= $rowval['Department'];
	$patentnumber= $rowval['Patent_Number'];
	$obtainedorfiled= $rowval['ObtainedORFile'];
	$registery= $rowval['Patent_Registered'];
	$commercialization= $rowval['Commercialized_or_Not'];
	$commercializeddate= $rowval['Commercialized_Date'];
	$patentgrantyear= $rowval['Patent_Grant_Year'];
	$amount= $rowval['Amount'];
	$jointwithinst= $rowval['Joint_with_inst'];
	
	};

if(isset($_POST['submit'])){
	
	$patenttitle= $_POST['patent_title'];
	$patenttype= $_POST['Patent_type'];
	$Department= $_POST['Department'];
	$patentnumber= $_POST['Patent_number'];
	$obtainedorfiled= $_POST['obtainedorfiled'];
	$registery= $_POST['registery'];
	$commercialization= $_POST['commercialization'];
	$commercializeddate= $_POST['commercialized_date'];
	$patentgrantyear= $_POST['Patentgrant_yr'];
	$amount= $_POST['amount'];
	$jointwithinst= $_POST['joint_with_inst'];

					$allowed = mysqli_query($conn,"UPDATE patents SET `Patent_Title`='$patenttitle',`Patent_Type`='$patenttype',
					`Department`='$Department',`Patent_Number`='$patentnumber',`ObtainedORFile&Filed`='$obtainedorfiled',
					`Patent_Registered`='$registery',`Commercialized_or_Not`='$commercialization',`Commercialized_Date`='$commercializeddate',
					`Patent_Grant_Year`='$patentgrantyear',`Amount`='$amount',`Joint_with_inst`='$jointwithinst' WHERE
					`UID`='$uid' AND patentsID='".$_GET['id']."'");
}
$conn->close();
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
	<div class="container"style="padding-top: 20px; padding-bottom: 30px;"><br>
		
		<div class="col-lg-9 m-auto d-block">
			
			
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" class="form-control z-depth-4" onsubmit="return validation()">
				<div style="padding-top: 20px;"></div>
				<h4 class="font-weight-bold"> Patents</h4>
				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="Appointed as" class="font-weight-bold"> Patent Title: </label>
					<input type="text" name="patent_title" class="form-control" id="pat_title" autocomplete="off" value='<?php echo $patenttitle; ?>'>
					<span id="patenttitle_span" class="text-danger"> </span>
				</div>
				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label class="font-weight-bold">Patent Type:</label>
                    <select class="form-control" id="sel2" name="Patent_type">
                    <option value="Product Based" value="">Select Patent type</option>
                    <option value="Product Based" value="Product Based" <?php if($patenttype=="Product Based"){?> selected <?php } ?> >Product Based</option>
    				<option value="Process Based" value="Process Based" <?php if($patenttype=="Process Based"){?> selected <?php } ?> >Process Based</option>
  					</select>
				</div>
				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label class="font-weight-bold">Department :</label>
                    <select class="form-control" id="sel1" name="Department">
                    <option value="">Select Department</option>
					<option value="Computer Science And Engineering" <?php if($Department=="Computer Science And Engineering"){?> selected <?php } ?> >Computer Science And Engineering</option>
    				<option value="Information Technology" <?php if($Department=="Information Technology"){?> selected <?php } ?>  >Information Technology</option>
    				<option value="Instrumentation Engineering" <?php if($Department=="Instrumentation Engineering"){?> selected <?php } ?> >Instrumentation Engineering</option>
    				<option value="Electronics And Telecommunication Engineering" <?php if($Department=="Electronics And Telecommunication Technology"){?> selected <?php } ?> >Electronics And Telecommunication Engineering</option>
    				<option value="Electrical Engineering" <?php if($Department=="Electrical Engineering"){?> selected <?php } ?>>Electrical Engineering</option>
    				<option value="Civil Engineering"  <?php if($Department=="Civil Engineering"){?> selected <?php } ?> >Civil Engineering</option>
    				<option value="Mechanical Engineering" <?php if($Department=="Mechanical Engineering"){?> selected <?php } ?>>Mechanical Engineering</option>
					<option value="Applied Mechanics" <?php if($Department=="Applied Mechanics"){?> selected <?php } ?>>Applied Mechanics</option>
    				<option value="Applied Physics" <?php if($Department=="Applied Physics"){?> selected <?php } ?>>Applied Physics</option>
    				<option value="Applied Chemistry" <?php if($Department=="Applied Chemistry"){?> selected <?php } ?>>Applied Chemistry</option>
					<option value="Engineering mathematics" <?php if($Department=="Engineering mathematics"){?> selected <?php } ?>>Engineering mathematics</option>
  					</select>
				</div>
					<span id="work" class="text-danger"></span>

				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="patent_no" class="font-weight-bold">  Patent Number: </label>
					<input type="text" class="form-control" id="pat_no" name="Patent_number" autocomplete="off" value='<?php echo $patentnumber; ?>'>
					<span id="patent_number" class="text-danger"> </span>
				</div>
				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label class="font-weight-bold"> Patent ? </label>
					<div class="radio">
                    <label><input type="radio" name="obtainedorfiled" id="obt" value="obtained" <?php if ($obtainedorfiled == 'obtained') {echo ' checked ';} ?>>obtained</label>
                     </div>
                   <div class="radio">
                        <label><input type="radio" name="obtainedorfiled" id="obt" value="filed" <?php if ($obtainedorfiled == 'filed') {echo ' checked ';} ?>>Filed</label>
                     </div>
				</div>
				<span id="patenttype" class="text-danger"> </span>


				
				
					

					<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label class="font-weight-bold"> Patent Registered?  </label>
					<div class="radio">
                    <label><input type="radio" name="registery" id="reg" value="Yes" <?php if ($registery == 'Yes') {echo ' checked ';} ?>>Yes</label>
                     </div>
                   <div class="radio">
                        <label><input type="radio" name="registery" id="reg" value="No" <?php if ($registery == 'No') {echo ' checked ';} ?>>No</label>
                     </div>
				</div>
				<span id="reg" class="text-danger"> </span>


				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label class="font-weight-bold"> Nationally/Internationally Commercialized?  </label>
					<div class="radio">
                    <label><input type="radio" name="commercialization" id="comm" value="Yes" <?php if ($commercialization == 'Yes') {echo ' checked ';} ?>>Yes</label>
                     </div>
                   <div class="radio">
                        <label><input type="radio" name="commercialization" id="comm" value="No" <?php if ($commercialization == 'No') {echo ' checked ';} ?>>No</label>
                     </div>
				</div>

				<span id="comm" class="text-danger"> </span>
				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label class="font-weight-bold"> Commercialized date : </label><br>
					<input type="date" name="commercialized_date" id="date" value='<?php echo $commercializeddate; ?>'>
					<br><label class="text-primary text-center"> If exact date is unknown, enter the date 1 of that month with corresponding year.</label><br>
					<span id="dates" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="patentgrant_yr" class="font-weight-bold">  Patent Grant Date/Year: </label><br>
					<input type="date" id="pg_yr" name="Patentgrant_yr"  value='<?php echo $patentgrantyear; ?>'>
					<br><label class="text-primary text-center"> If only year is known to you then please enter 1 january of the corresponding year</label><br>
					<span id="patentgrantyear" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="inv" class="font-weight-bold"> Amount : </label>
					<input type="text" name="amount" class="form-control" id="amt" autocomplete="off" value='<?php echo $amount; ?>'>
					<span id="amount_span" class="text-danger"> </span>
				</div>
				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label class="font-weight-bold">Whether joint with any institute :</label>
                    <select class="form-control" id="sel2" name="joint_with_inst">
                    <option value=""></option>
                    <option value="Academic institute" <?php if($jointwithinst=="Academic institute"){?> selected <?php } ?> >Academic Institute</option>
    				<option value="R&D Institute" <?php if($jointwithinst=="R&D Institute"){?> selected <?php } ?> >R&D Institute</option>
    				<option value="Other" <?php if($jointwithinst=="Other"){?> selected <?php } ?> >Other</option>
    				</select>
				</div>
					<span id="joint" class="text-danger"></span>



				<center><input type="submit" name="submit" value="submit" class="btn btn-info" autocomplete="off"></center>
				<div style="padding-top: 40px;"></div>

				</form>
		</div>
	</div>


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
			if((pat_title.length <= 2) || (pat_title.length > 50)) {
				document.getElementById('patenttitle_span').innerHTML =" **Lenght must be between 2 and 50";
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
			if(isNaN(patentgrantyr)){
				document.getElementById('patentgrantyear').innerHTML =" **Enter the Patent grant year(in digits) ";
				return false;
			}
			
			if(amount == ""){
				document.getElementById('amount_span').innerHTML =" **Please fill the amount field";
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



