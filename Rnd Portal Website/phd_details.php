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

if(isset($_POST['submit'])){
	$chars = "0123456789abcdefghijklmnopqrstuvwxyz";
    $phdid = substr( str_shuffle( $chars ), 0, 7 );
	$nameoftopic= $_POST['nameoftpc'];
	$nameofguide= $_POST['nameofguide'];
	$phdcollege= $_POST['phdcollege'];
	$phduniversity= $_POST['phduniversity'];
	$registrationno= $_POST['regno'];
	$uploadletter= $_POST['file1'];
	$yearofobtaining= $_POST['yobphd'];

	 $query_dupl = mysqli_query($conn, "SELECT * FROM phd_details WHERE phdID='$phdid' ");

            if(mysqli_num_rows($query_dupl) > 0 ) {
                echo"<br>";
                echo "<font color=red size=4 >";
                echo"<center><b>";
                echo "Sorry fo the inconvenience, Please try again!";
                echo"</b></center>";
            }
            else{    
	
	
					$allowed = mysqli_query($conn,"INSERT INTO phd_details(Name_of_topic, Name_of_guide, College_name, 
					University, Registration_no, Upload_letterORdegree, year_of_obtaining, phdID, UID)
					VALUES ('$nameoftopic', '$nameofguide', '$phdcollege','$phduniversity','$registrationno','$uploadletter'
					,'$yearofobtaining', '$phdid', '$uid')");

					echo "Data Saved!";
}

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
                <h4 class="font-weight-bold"> PhD Details</h4>
				

				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="name_of_tpc" class="font-weight-bold"> Name of Topic: </label>
					<input type="text" name="nameoftpc" class="form-control" id="nameof_tpc" autocomplete="off">
					<span id="nameoftpc_span" class="text-danger"> </span>
				</div>
                <div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="name_of_guide" class="font-weight-bold"> Name of Guide: </label>
					<input type="text" name="nameofguide" class="form-control" id="nameof_guide" autocomplete="off">
					<span id="nameofguide_span" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="phd_college" class="font-weight-bold"> College Name: </label>
					<input type="text" name="phdcollege" class="form-control" id="phd_college" autocomplete="off">
					<span id="phdcollege_span" class="text-danger"> </span>
				</div>
                <div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="phd_university" class="font-weight-bold"> University: </label>
					<input type="text" name="phduniversity" class="form-control" id="phd_university" autocomplete="off">
					<span id="phduniversity_span" class="text-danger"> </span>
				</div>
				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label class="font-weight-bold">PhD Status :</label>
                    <select class="form-control" id="phd_status" name="phd_status" onchange="ShowHideDiv()">
                    <option value="P">Pursuing</option>
    				<option value="C">Completed</option>
    				
  					</select>
				</div>
	
				<div class="form-group col-lg-11 col-md-11 col-xs-11"  id="registrationNo" >
					<label for="registrationno" class="font-weight-bold"> Registration No.: </label>
					<input type="text" name="regno" class="form-control" id="reg_no" autocomplete="off" >
					<span id="registrationno_span" class="text-danger"> </span>
				</div>
				<div class="form-group col-lg-4 col-md-4 col-xs-4" id="phdadmin" >
					<label class="font-weight-bold"> Whether Recognized as a PhD administrator ?  </label>
					<div class="radio">
                    <label><input type="radio" name="recgasphd" value="Yes"  >Yes</label>
                     </div>
                   <div class="radio">
                        <label><input type="radio" name="recgasphd" value="No"  >No</label>
                     </div>
				</div>
                <form action="upload_file.php" method="post" enctype="multipart/form-data">
				<label for="uploadletter"  class="font-weight-bold">Upload Registration letter/Degree Certificate:            
				<br></label>
                   <input type="file" name="file1" size="50" />
                  
            
                <div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="yearofobtaining" class="font-weight-bold"> Year of Obtaining phD: </label>
					<input type="text" name="yobphd" class="form-control" id="yob_phd" autocomplete="off">
					<span id="yearofobtaining_span" class="text-danger"> </span>
				</div>
                   
                   <br>
                  
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

			var nameoftpc = document.getElementById('nameof_tpc').value;
			var nameofguide = document.getElementById('nameof_guide').value;
			var phdcollege = document.getElementById('phd_college').value;
			var phduniversity = document.getElementById('phd_university').value;
			var regno = document.getElementById('reg_no').value;
			var yobphd = document.getElementById('yob_phd').value;
			


			if(nameoftpc == ""){
				document.getElementById('nameoftpc_span').innerHTML =" **Please fill the name of topic  field";
				return false;
			}
			if(!isNaN(nameoftpc)){
				document.getElementById('nameoftpc_span').innerHTML =" **Only characters are allowed";
				return false;
			}


			if(nameofguide == ""){
				document.getElementById('nameofguide_span').innerHTML =" **Please fill the College name field";
				return false;
			}
			if(!isNaN(nameofguide)){
				document.getElementById('nameofguide_span').innerHTML =" **Only characters are allowed";
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


			if(phduniversity == ""){
				document.getElementById('phduniversity_span').innerHTML =" **Please fill the phd University name field";
				return false;
			}
			if(!isNaN(phduniversity)){
				document.getElementById('phduniversity_span').innerHTML =" **Only characters are allowed";
				return false;
			}


			if(regno == ""){
				document.getElementById('regno_span').innerHTML =" **Please fill the registration number field";
				return false;
			}
			if(!isNaN(regno)){
				document.getElementById('regno_span').innerHTML =" **both numbers and characters are allowed";
				return false;
			}


			if(yobphd == ""){
				document.getElementById('yobphd_span').innerHTML =" **Please enter the year of obtaining phD";
				return false;
			}
			if(isNaN(yobphd)){
				document.getElementById('yobphd_span').innerHTML =" **Only numbers are allowed";
				return false;
			}
			if(yobphd.length == 4) {
				document.getElementById('last_name').innerHTML =" **Lenght must be 4";
				return false;	
			}
            <?php

 $targetfolder = "testupload/";

 $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;

 $ok=1;

$file_type=$_FILES['file']['type'];

if ($file_type=="application/pdf" || $file_type=="image/gif" || $file_type=="image/jpeg") {

 if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))

 {

 echo "The file ". basename( $_FILES['file']['name']). " is uploaded";

 }

 else {

 echo "Problem uploading file";

 }

}	
		?>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#phd_status").change(function () {
            if ($(this).val() == "P") {
                $("#registrationNo").show();
            } else {
                $("#registrationNo").hide();
            }
		});
		$("#phd_status").change(function () {
            if ($(this).val() == "C") {
                $("#phdadmin").show();
            } else {
                $("#phdadmin").hide();
            }
        });
    });
</script>



<!--JAVASCRIPT-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>