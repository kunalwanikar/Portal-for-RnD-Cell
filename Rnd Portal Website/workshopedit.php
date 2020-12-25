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

$sql = "SELECT * FROM workshops where UID = '$uid' AND workshopID = '".$_GET['id']."' ";
$res = $conn->query($sql);
while($rowval = $res->fetch_assoc()) {

	$subjectofworkshop= $rowval['Title'];
	$department= $rowval['Department'];
	$broadarea= $rowval['Broad_area'];
	$datefrom= $rowval['Date_from'];
	$dateto= $rowval['Date_to'];
	$noofparticipants = $rowval['No_of_participants'];
	$teqip = $rowval['Under_TEQIP_or_Not'];
	$amount = $rowval['Amount'];
	$description = $rowval['Description'];
	
	};


if(isset($_POST['submit'])){
	
	$subjectofworkshop= $_POST['subject_of_workshop'];
	$department= $_POST['department'];
	$broadarea= $_POST['broad_area'];
	$datefrom= $_POST['date_from'];
	$dateto= $_POST['date_to'];
	$noofparticipants= $_POST['no_of_participants'];
	$teqip= $_POST['teqip'];
	$amount= $_POST['amount'];
	$description= $_POST['description'];
	
			$allowed = mysqli_query($conn,"UPDATE workshops SET `Title`='$subjectofworkshop',
			`Department`='$department',`Broad_area`='$broadarea',
			`Date_from`='$datefrom',`Date_to`='$dateto',`No_of_participants`='$noofparticipants',
			`Under_TEQIP_or_Not`='$teqip',`Amount`='$amount',`Desciption`='$description' WHERE `UID`='$uid' AND 'workshopID'='".$_GET[id]."' ");
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
	<div class="container" style="padding-bottom: 10px; padding-top: 30px;"><br>
		
		<div class="col-lg-9 m-auto d-block">
			
			
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" class="form-control z-depth-4" onsubmit="return validation()">
				<div style="padding-top: 20px;"></div>
                 <h4 class="font-weight-bold"> Workshops</h4>
<div class="row">
				 <div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label for="sub" class="font-weight-bold">Subject of Workshop: </label>
					<input type="text" name="subject_of_workshop" class="form-control" id="wor_sub" autocomplete="off" value='<?php echo $subjectofworkshop; ?>'>
					<span id="workshop_subject" class="text-danger"> </span>
				</div>
				
			      <div class="form-group col-lg-6 col-md-6 col-xs-6">
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
</div>
<div class="row">
					<span id="work" class="text-danger"></span>
					<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label for="broadarea" class="font-weight-bold">Broad Area : </label>
					<input type="text" name="broad_area" class="form-control" id="b_area" autocomplete="off" value='<?php echo $broadarea; ?>'>
					<span id="broadarea_span" class="text-danger"> </span>
				</div>
                <div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label class="font-weight-bold"> Date from: </label>
					<input type="date" name="date_from" id="date1" value='<?php echo $datefrom; ?>'>
					<br><label class="text-danger text-center"> If exact date is unknown, enter the date 1 of that month with corresponding year.</label><br>
					<span id="dates1" class="text-danger"> </span>
				</div>
</div>
<div class="row">
				<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label class="font-weight-bold"> Date to: </label><br>
					<input type="date" name="date_to" id="date2" value='<?php echo $dateto; ?>'>
					<br><label class="text-danger text-center"> If exact date is unknown, enter the date 1 of that month with corresponding year.</label><br>
					<span id="dates2" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label for="part_num" class="font-weight-bold">  Number of participants : </label>
					<input type="text" name="no_of_participants" class="form-control col-lg-3 col-md-3 col-xs-3" id="parti_num" autocomplete="off" value='<?php echo $noofparticipants; ?>'>
					<span id="participant_number" class="text-danger"> </span>
				</div>
					<span id="work" class="text-danger"></span>
</div>
<div class="row">
					<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label class="font-weight-bold"> Workshop under TEQIP?  </label>
					<div class="radio">
                    <label><input type="radio" name="teqip" value="Yes" <?php if ($teqip == 'Yes') {echo ' checked ';} ?> >Yes</label>
                     </div>
                   <div class="radio">
                        <label><input type="radio" name="teqip" value="No" <?php if ($teqip == 'No') {echo ' checked ';} ?> >No</label>
                     </div>
				</div>
				<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label for="amount" class="font-weight-bold">  Amount : </label>
					<input type="text" name="amount" class="form-control col-lg-3 col-md-3 col-xs-3" id="amt" autocomplete="off" value='<?php echo $amount; ?>'>
					<span id="amount_span" class="text-danger"> </span>
				</div>
</div>
<div class="row">
				<div class="form-group col-lg-12 col-md-12 col-xs-12">
					<label class="font-weight-bold"> Workshop Description in short : </label>
					<textarea class="form-control" id="address" rows="5" autocomplete="off" name="description" <?php echo $description; ?> ></textarea>
					<span id="res_add" class="text-danger"> </span>
				</div>
</div>

				<center><input type="submit" name="submit" value="submit" class="btn btn-info" autocomplete="off"></center>
				<div style="padding-top: 20px;"></div>
				</form>
		</div>
	</div>



<!--JAVASCRIPT-->
	<script type="text/javascript">
		

		function validation(){

			var wor_sub = document.getElementById('wor_sub').value;
			var date1 = document.getElementById('date1').value;
			var date2 = document.getElementById('date2').value;
			var parti_num = document.getElementById('parti_num').value;
			var address = document.getElementById('address').value;




			if(wor_sub == ""){
				document.getElementById('workshop_subject').innerHTML ="**Please fill the Subject of Workshop field";
				return false;
			}
			if((wor_sub.length <= 2) || (wor_sub.length > 20)) {
				document.getElementById('workshop_subject').innerHTML ="**Lenght must be between 2 and 20";
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


			if(parti_num == ""){
				document.getElementById('participant_number').innerHTML =" **Please fill the Number of Participants field";
				return false;
			}
			if(isNaN(parti_num)){
				document.getElementById('participant_number').innerHTML =" **User must enter digits only not characters";
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
