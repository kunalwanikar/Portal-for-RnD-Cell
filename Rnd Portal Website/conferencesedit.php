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

$sql = "SELECT * FROM conferences where UID = '$uid' AND conferenceID = '".$_GET['id']."' ";
                                   

$res = $conn->query($sql);
while($rowval = $res->fetch_assoc()) {

	$subofconference= $rowval['Title'];
	$datefrom= $rowval['Date_From'];
	$dateto= $rowval['Date_to'];
	$broadarea= $rowval['Broad_area'];
	$description= $rowval['description'];
	$type = $rowval['NationalORInternational'];

	};
if(isset($_POST['submit'])){
	
    $subofconference= $_POST['subject_of_conference'];
		$datefrom= $_POST['date_from'];
		$dateto= $_POST['date_to'];
		$broadarea= $_POST['broad_area'];
		$type = $_POST['type'];
		$description= $_POST['con_description'];
		
		$allowed = mysqli_query($conn,"UPDATE conferences SET `Title`='$subofconference',
		`Date_From`='$datefrom',`Date_to`='$dateto',`Broad_area`='$broadarea', `NationalORInternational`='$type', `description`='$description' WHERE 'UID'='$uid' AND 'conferenceID'='".$_GET['id']."' ");
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Conferences || R&D Department || Government College of Engineering, Amravati.</title>
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

	<div style="padding-top: 5px; padding-bottom: 5px; padding-left: 5px; padding-right: 5px;"><br>
		
		<div>
			<div class="text-danger font-weight-bold text-center">
			</div>
			
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" class="form-control z-depth-4" onsubmit="return validation()">
				<div style="padding-top: 30px;"></div>
				<center><h4 class="font-weight-bold"> Conferences</h4></center>

<div class="row">
				<div class="form-group col-lg-4 col-md-4 col-xs-4">
					<label for="sub" class="font-weight-bold">Subject of Conference : </label>
					<input type="text" name="subject_of_conference" class="form-control" id="con_sub" autocomplete="off" value='<?php echo $subofconference; ?>' >
					<span id="conference_subject" class="text-danger"> </span>
				</div>


				<div class="form-group col-lg-4 col-md-4 col-xs-4">
					<label class="font-weight-bold"> Date from : </label><br>
					<input type="date" name="date_from" id="date1" value='<?php echo $datefrom; ?>' >
					<br><label class="text-danger text-center"> If exact date is unknown, enter the date 1 of that month with corresponding year.</label><br>
					<span id="dates1" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-4 col-md-4 col-xs-4">
					<label class="font-weight-bold"> Date to   : </label><br>
					<input type="date" name="date_to" id="date2" value='<?php echo $dateto; ?>' >
					<br><label class="text-danger text-center"> If exact date is unknown, enter the date 1 of that month with corresponding year.</label><br>
					<span id="dates2" class="text-danger"> </span>
				</div>
</div>
<div class="row">

				<div class="form-group col-lg-4 col-md-4 col-xs-4">
					<label for="part_num" class="font-weight-bold">Broad area : </label>
					<input type="text" name="broad_area" class="form-control" id="broadarea" autocomplete="off" value='<?php echo $broadarea; ?>'>
					<span id="broadarea_span" class="text-danger"> </span>
				</div>
					<span id="work" class="text-danger font-weight-bold"></span>

				<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label class="font-weight-bold"> Published paper was?  </label>
					<div class="radio">
                    <label><input type="radio" name="type" value="National" <?php if ($type == 'National') {echo ' checked ';} ?> >National</label>
                     </div>
                   <div class="radio">
                        <label><input type="radio" name="type" value="International" <?php if ($type == 'International') {echo ' checked ';} ?> >International</label>
                     </div>
				</div>


				<div class="form-group col-lg-4 col-md-4 col-xs-4">
					<label class="font-weight-bold"> Conference Description in short : </label>
					<textarea  <?php echo $description; ?> class="form-control" id="address" rows="3" autocomplete="off" name="con_description" ></textarea>
					<span id="res_add" class="text-danger"> </span>
				</div>
</div>

				<center><input type="submit" name="submit" value="submit" class="btn btn-info" autocomplete="off"></center>
				<div style="padding-top: 40px;"></div>

				</form>
		</div>
	</div>






<!--JAVASCRIPT-->
	<script type="text/javascript">
		

		function validation(){

			var con_sub = document.getElementById('con_sub').value;
			var parti_num = document.getElementById('parti_num').value;
			var address = document.getElementById('address').value;
			var date1 = document.getElementById('date1').value;
			var date2 = document.getElementById('date2').value;





			if(con_sub == ""){
				document.getElementById('conference_subject').innerHTML =" ** Please fill the Subject of Conference field";
				return false;
			}
			if(!isNaN(con_sub)){
				document.getElementById('conference_subject').innerHTML =" ** only characters are allowed";
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
				document.getElementById('participant_number').innerHTML =" **User must enter digits only not characters";
				return false;
			}


			if(address ==""){
				document.getElementById('res_add').innerHTML = "**Please Enter the description in short";
				return false;
			}


		}
	</script>

<!--JAVASCRIPT-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>

