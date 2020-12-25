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

$sql = "SELECT * FROM recg_as_phd where UID = '$uid' and dataID = '".$_GET['id']."' ";
                                   

$res = $conn->query($sql);
while($rowval = $res->fetch_assoc()) {

	$recgasphd= $rowval['Recognized'];
	$phduniversity= $rowval['University'];
	$phdcollege= $rowval['College_name'];
	$yearofobtaining= $rowval['Year'];
	$noofstudentscomp= $rowval['stud_completed'];
	$noofstudentspurs= $rowval['stud_pursuing'];
	};

if(isset($_POST['submit'])){
	
    $recgasphd= $_POST['recgasphd'];
    $phduniversity= $_POST['phduniversity'];
    $phdcollege= $_POST['phdcollege'];
	$yearofobtaining= $_POST['yobphd'];
	$noofstudentscomp= $_POST['noofstudentscomp'];
	$noofstudentspurs= $_POST['noofstudentspurs'];
	
	
					$allowed = mysqli_query($conn,"UPDATE phd_details SET `Recognized`='$recgasphd',`University`='$phduniversity',
					`College_name`='$phdcollege',`Year`='$yearofobtaining',`stud_completed`='$noofstudentscomp',
					`stud_pursuing`='$noofstudentspurs' WHERE `UID`='$uid' AND dataID='".$_GET['id']."' ");
}
$conn->close();
?>







<!DOCTYPE html>
<html>
<head>
	<title>Qualification | Principal | R&D Department | Government College of Engineering, Amravati.</title>
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
	<div class="container"style="padding-bottom: 30px;padding-top: 30px">
		
		<div class="col-lg-9 m-auto d-block">
			
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" class="form-control z-depth-4" onsubmit="return validation()">
				<div style="padding-top: 30px;"></div>
                <h4 class="font-weight-bold"> Recognized as phD</h4>
				
				<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label class="font-weight-bold"> Whether Recognized as a PhD administrator ?  </label>
					<div class="radio">
                    <label><input type="radio" name="recgasphd" value="Yes" <?php if ($recgasphd == 'Yes') {echo ' checked ';} ?> >Yes</label>
                     
                   
                        <label><input type="radio" name="recgasphd" value="No" <?php if ($recgasphd == 'No') {echo ' checked ';} ?> >No</label>
                     </div>
				</div>


				

                <div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="phd_university" class="font-weight-bold"> University: </label>
					<input type="text" name="phduniversity" class="form-control" id="phd_university" autocomplete="off" value='<?php echo $phduniversity; ?>'>
					<span id="phduniversity_span" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="phd_college" class="font-weight-bold"> College Name: </label>
					<input type="text" name="phdcollege" class="form-control" id="phd_college" autocomplete="off" value='<?php echo $phdcollege; ?>'>
					<span id="phdcollege_span" class="text-danger"> </span>
				</div>
                <div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="yearofobtaining" class="font-weight-bold"> Year of Obtaining phD: </label>
					<input type="text" name="yobphd" class="form-control" id="yob_phd" autocomplete="off" value='<?php echo $yearofobtaining; ?>'>
					<span id="yearofobtaining_span" class="text-danger"> </span>
				</div>
                

				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="completedstud" class="font-weight-bold"> No. of students completed PhD: </label>
					<input type="text" name="noofstudentscomp" class="form-control" id="noofstudents_comp" autocomplete="off" value='<?php echo $noofstudentscomp; ?>'>
					<span id="noofstudentscomp_span" class="text-danger"> </span>
				</div>
                <div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="pursuingstud" class="font-weight-bold"> No. of students Pursuing PhD: </label>
					<input type="text" name="noofstudentspurs" class="form-control" id="noofstudents_purs" autocomplete="off" value='<?php echo $noofstudentspurs; ?>'>
					<span id="noofstudentspurs_span" class="text-danger"> </span>
				</div>

                
                   <center><input type="submit" name="submit" value="submit" class="btn bg-info" autocomplete="off"></center>
				<div style="padding-top: 40px;"></div>
               </form>
               </form>

				
				

			</div>
			</form>
		</div>
	</div>


<!--JAVASCRIPT-->
	<script type="text/javascript">
		

		function validation(){

			var recgasphd = document.getElementById('recgas_phd').value;
			var phduniversity = document.getElementById('phd_university').value;
            var phdcollege = document.getElementById('phd_college').value;
            var yobphd = document.getElementById('yob_phd').value;
			var noofstudentscomp = document.getElementById('noofstudents_comp').value;
			var noofstudentspurs = document.getElementById('noofstudents_purs').value;
			
			


			if(recgasphd == ""){
				document.getElementById('recgasphd_span').innerHTML =" **Please fill whether you are recognized as phD or not field";
				return false;
			}
			if(!isNaN(recgasphd)){
				document.getElementById('recgasphd_span').innerHTML =" **Only characters are allowed";
				return false;
			}


			if(phduniversity == ""){
				document.getElementById('phduniversity_span').innerHTML =" **Please fill the phD University name field";
				return false;
			}
			if(!isNaN(phduniversity)){
				document.getElementById('phduniversity_span').innerHTML =" **Only characters are allowed";
				return false;
			}


			if(phdcollege == ""){
				document.getElementById('phdcollege_span').innerHTML =" **Please enter the college name where you have completed your Phd";
				return false;
			}
			if(!isNaN(phdcollege)){
				document.getElementById('phdcollege_span').innerHTML =" **Only characters are allowed";
				return false;
			}


			if(yobphd == ""){
				document.getElementById('yobphd_span').innerHTML =" **Please fill the year of obtaining phD field";
				return false;
			}
			if(isNaN(yobphd)){
				document.getElementById('yobphd_span').innerHTML =" **Only characters are allowed";
				return false;
			}
            if(yobphd.length == 4) {
				document.getElementById('last_name').innerHTML =" **Length must be 4";
				return false;	
			}

			if(noofstudentscomp == ""){
				document.getElementById('noofstudentscomp').innerHTML =" **Please fill the no. of students completed PhD field";
				return false;
			}
			if(isNaN(noofstudentscomp)){
				document.getElementById('noofstudentscomp_span').innerHTML =" **only numbers are allowed";
				return false;
			}


			if(noofstudentspurs == ""){
				document.getElementById('noofstudentspurs_span').innerHTML =" **Please fill the no. of students pursuing PhD field";
				return false;
			}
			if(isNaN(noofstudentspurs)){
				document.getElementById('noofstudentspurs_span').innerHTML =" **Only numebers are allowed";
				return false;
			}
            

	</script>
<!--JAVASCRIPT-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>