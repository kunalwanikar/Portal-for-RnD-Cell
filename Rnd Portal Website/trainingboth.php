<!--PHP Database Connection Starts-->
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

	$uid_training= $_SESSION['uid'];                        

if(isset($_POST['submit'])){

	$chars = "0123456789abcdefghijklmnopqrstuvwxyz";
    $trainingid = substr( str_shuffle( $chars ), 0, 7 );
    $trainingtype= $_POST['training_type'];
	$suboftraining= $_POST['subject_of_training'];
	$trainingsite= $_POST['train_site'];
	$noofparticipants= $_POST['no_of_participants'];
    $trainingduration= $_POST['training_duration'];
	$trainingdesc= $_POST['training_description'];

	$query_dupl = mysqli_query($conn, "SELECT * FROM trainings WHERE trainingID='$trainingid'");

			if(mysqli_num_rows($query_dupl) > 0 ) { //check if there is already an entry for that username
				echo"<br>";
				echo "<font color=red size=4 >";
				echo"<center><b>";
				echo "Sorry for the inconvenience, Please try again!";
				echo"</b></center>";
			}
			else{
 
                    $allowed = mysqli_query($conn,"INSERT INTO trainings(Type, Subject,Place_of_Training,No_of_participants,Time_Duration,Training_Description,trainingID, UID)
					VALUES ('$trainingtype','$suboftraining','$trainingsite','$noofparticipants','$trainingduration','$trainingdesc','$trainingid','$uid_training' )");

					echo "Data Saved!";
}
}
$conn->close();
?>

<!--PHP Database Connection Ends-->


<!DOCTYPE html>
<html>
<head>
	<title>InHouse Training | R&D Department | Government College of Engineering, Amravati.</title>
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
	
	<div class="container" style="padding-bottom: 30px; padding-top: 30px;"><br>
		
		<div class="col-lg-9 m-auto d-block">
			
			
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" class="form-control z-depth-4" onsubmit="return validation()">
				<div style="padding-top: 20px;"></div>


				<div class="form-group col-lg-11 col-md-11 col-xs-11">
				<h4 class="font-weight-bold">  Trainings</h4>

				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label class="font-weight-bold">Training Type :</label>
                    <select class="form-control" id="sel1" name="training_type">
                    <option value="Inhouse Training">Inhouse Training</option>
    				<option value="Outhouse Training">Outhouse Training</option>			
  					</select>
				</div>

				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label class="font-weight-bold">Training Program :</label>
                    <select class="form-control" id="sel1" name="training_typ ">
                    <option value="STTP">STTP</option>
    				<option value="FDP">FDP</option>
    				<option value="Pedagogy">Pedagogy</option>	
    				<option value="NITTTR">NITTTR</option>			
  					</select>
				</div>

				
					<label for="sub" class="font-weight-bold">Title: </label>
					<input type="text" name="subject_of_training" class="form-control" id="train_sub" autocomplete="off">
					<span id="trainingsub_span" class="text-danger"> </span>
				</div>
				
				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="site" class="font-weight-bold">Venue: </label>
					<input type="text" name="train_site" class="form-control" id="traing_site" autocomplete="off">
					<span id="trainingsite_span" class="text-danger"> </span>
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

				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="train_dur" class="font-weight-bold">  Duration of training (in weeks) : </label>
					<input type="text" name="training_duration" class="form-control col-lg-3 col-md-3 col-xs-3" id="training_dur" autocomplete="off">
					<span id="trainingduration_span" class="text-danger"> </span>
				</div>
					<span id="work" class="text-danger"></span>

				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label class="font-weight-bold"> Description in short : </label>
					<textarea class="form-control" id="train_desc" rows="5" autocomplete="off" name="training_description"></textarea>
					<span id="train_des" class="text-danger"> </span>
				</div>

				<center><input type="submit" name="Save" value="Save" class="btn btn-info" autocomplete="off"></center>
				<div style="padding-top: 40px;"></div>
				</form>
		</div>
	</div>



<!--JAVASCRIPT-->
	<script type="text/javascript">
		

		function validation(){

			var train_sub = document.getElementById('train_sub').value;
			var train_type = document.getElementById('sel1').value;
			var training_dur = document.getElementById('training_dur').value;
			var traing_site = document.getElementById('traing_site').value;
			var parti_num = document.getElementById('parti_num').value;
			var train_desc = document.getElementById('train_desc').value;
           



			if(train_sub == ""){
				document.getElementById('trainingsub_span').innerHTML ="**Please fill the Subject of Training field";
				return false;
			}
			if((train_sub.length <= 2) || (train_sub.length > 50)) {
				document.getElementById('trainingsub_span').innerHTML ="**Lenght must be between 2 and 50";
				return false;	
			}
			if(!isNaN(train_sub)){
				document.getElementById('trainingsub_span').innerHTML ="**Only characters are allowed";
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


			if(training_dur == ""){
				document.getElementById('trainingduration_span').innerHTML =" **Please fill the Number of Participants field";
				return false;
			}
			if(isNaN(training_dur)){
				document.getElementById('trainingduration_span').innerHTML =" **User must enter digits only not characters";
				return false;
			}
			if((training_dur.values <= 1) || (training_dur.values > 10)) {
				document.getElementById('trainingduration_span').innerHTML ="**Enter Correct number of training weeks";
				return false;	
			}


			if(traing_site == ""){
				document.getElementById('trainingsite_span').innerHTML =" **Please fill the Number of Participants field";
				return false;
			}
			if(!isNaN(traing_site)){
				document.getElementById('trainingsite_span').innerHTML =" **Only characters are allowed";
				return false;
			}


			if(train_desc == ""){
				document.getElementById('train_des').innerHTML ="**Please enter the description of workshop";
				return false;
			}


		}
	</script>

<!--JAVASCRIPT-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
