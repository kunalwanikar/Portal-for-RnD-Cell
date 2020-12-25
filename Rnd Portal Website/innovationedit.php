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

$sql = "SELECT * FROM innovations where UID = '$uid' AND innovationID = '".$_GET['id']."' ";
                                   

$res = $conn->query($sql);

while($rowval = $res->fetch_assoc()) {

	$innotitle= $rowval['Innovation_title'];
	$Department= $rowval['Department'];
	$innodate= $rowval['Innovation_date'];
	$innotype= $rowval['ProductORprocess'];
	$transfer= $rowval['TechnologyTransfer'];
	$transferdate= $rowval['Transfer_Date'];
	$organizationname= $rowval['Org_name'];
	$commercialized= $rowval['Commercialized_orNot'];
	$commdate= $rowval['Commercialized_Date'];
	$amount= $rowval['Amount'];
	};

if(isset($_POST['submit'])){
        $innovationtitle= $_POST['Innovation_title'];
		$department= $_POST['Department'];
		$transfer= $_POST['transfer'];
		$transferdate= $_POST['transfer_date'];
		$organizationname= $_POST['organization_name'];
		$innovationdate= $_POST['innov_date']; 
		$innovationcomm= $_POST['innov_comm'];
		$innovationtype= $_POST['Innovation_type'];
		$commercialization= $_POST['commercialization'];
		$amount= $_POST['Amount'];
		
          $allowed = mysqli_query($conn,"UPDATE `innovations` SET `Innovation_title`='$innovationtitle',`Department`='$department',`Innovation_date`='innovationdate',`ProductORprocess`='innovationtype',`TechnologyTransfer`='$transfer',`Transfer_Date`='#transferdate',`Org_name`='organizationname',`Commercialized_orNot`='commercialization',`Amount`='$amount',`Commercialized_Date`='$innovationcomm' WHERE `UID`='$uid' AND `innovationID`='".$_GET['id']."' ");

          echo "Data Saved!";
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
	<div class="container" style="padding-top: 20px; padding-bottom: 30px;"><br>
		
		<div class="col-lg-9 m-auto d-block">
		
			
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" class="form-control z-depth-4" onsubmit="return validation()">
				<div style="padding-top: 20px;"></div>

				<div class="form-group col-lg-11 col-md-11 col-xs-11">
				<h4 class="font-weight-bold"> Innovations</h4>
					<label for="inno" class="font-weight-bold">Innovation Title: </label>
					<input type="text" name="Innovation_title" class="form-control" id="inno_title" autocomplete="off" value='<?php echo $innotitle; ?>'>
					<span id="innovation_title" class="text-danger"> </span>
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
					<label class="font-weight-bold"> Technology Transferred to any Organization/Industry/Client? </label>
					<div class="radio">
                    <label><input type="radio" name="transfer" id="techtransfer" value="Yes" <?php if ($transfer == 'Yes') {echo ' checked ';} ?> > Yes </label>
                     </div>
                   <div class="radio">
                        <label><input type="radio" name="transfer" id="techtransfer" value="No" <?php if ($transfer == 'No') {echo ' checked ';} ?> > No </label>
                     </div>
				</div>
				<span id="transfer" class="text-danger"> </span>


				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label class="font-weight-bold"> Transfer date : </label><br>
					<input type="date" name="transfer_date" id="date1" value='<?php echo $transferdate; ?>'>
					<br><label class="text-danger text-center"> If exact date is unknown, enter the date 1 of that month with corresponding year.</label>
					<br><span id="dates1" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="org" class="font-weight-bold"> Name of Organization/Industry/Client (transfered to) : </label>
					<input type="text" class="form-control" id="organinz_name" name="organization_name" autocomplete="off" value='<?php echo $organizationname; ?>'>
					<span id="org_name" class="text-danger"> </span>
				</div>

				
				<div class="row">				
				<div class="form-group col-lg-4 col-md-4 col-xs-4">
					<label class="font-weight-bold"> Date of Innovation : </label><br>  
					<input type="date" name="innov_date" value='<?php echo $innodate; ?>'>
				</div>
				</div>

				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label class="font-weight-bold">Innovation Type:</label>
                    <select class="form-control" id="select_2" name="Innovation_type">
                    <option value="" <?php if($innotype==""){?> selected <?php } ?> >Select Innovation Type</option>
                    <option value="Product Based" <?php if($innotype=="Product Based"){?> selected <?php } ?>>Product Based</option>
    				<option value="Process Based" <?php if($innotype=="Process Based"){?> selected <?php } ?>>Process Based</option>
  					</select>
				</div>
					<span id="select2_span" class="text-danger"></span>

				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label class="font-weight-bold"> Nationally/Internationally Commercialized?  </label>
					<div class="radio">
                    <label><input type="radio" name="commercialization" id="comm" value="Yes" <?php if ($commercialized == 'Yes') {echo ' checked ';} ?> >Yes</label>
                     </div>
                   <div class="radio">
                        <label><input type="radio" name="commercialization" id="comm" value="No" <?php if ($commercialized == 'No') {echo ' checked ';} ?> >No</label>
                     </div>
				</div>
				<span id="comm" class="text-danger"> </span>

				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="inv" class="font-weight-bold"> Amount(INR): </label>
					<input type="text"  class="form-control" id="amt" autocomplete="off" name="Amount" value='<?php echo $amount; ?>'> 
					<span id="amount" class="text-danger"> </span>
				</div>

				
				<div class="row">				
				<div class="form-group col-lg-8 col-md-8 col-xs-8">
					<label class="font-weight-bold"> Date of Commercialization : </label><br>  
					<input type="date" name="innov_comm" value='<?php echo $commdate; ?>'>
				</div>
				</div>


				<center><input type="submit" name="submit" value="Save" class="btn btn-info" autocomplete="off"></center>
				<div style="padding-top: 40px;"></div>

				</form>
		</div>
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