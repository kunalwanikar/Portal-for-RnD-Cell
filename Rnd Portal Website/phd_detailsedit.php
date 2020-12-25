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

$sql = "SELECT * FROM phd_details WHERE UID = '$uid' and phdID = '".$_GET['id']."' ";
                                   

$res = $conn->query($sql);
while($rowval = $res->fetch_assoc()) {

	$nameoftopic= $rowval['Name_of_topic'];
	$nameofguide= $rowval['Name_of_guide'];
	$phdcollege= $rowval['College_name'];
	$phduniversity= $rowval['University'];
	$registrationno= $rowval['Registration_no'];
	$uploadletter= $rowval['Upload_letterORdegree'];
	$status= $rowval['status'];
	$yearofobtaining= $rowval['year_of_obtaining'];
	
	};
if(isset($_POST['submit'])){
	
	$nameoftopic= $_POST['nameoftpc'];
	$nameofguide= $_POST['nameofguide'];
	$phdcollege= $_POST['phdcollege'];
	$phduniversity= $_POST['phduniversity'];
	$registrationno= $_POST['regno'];
	$uploadletter= $_POST['file1'];
	$yearofobtaining= $_POST['yobphd'];
	$status= $_POST['phd_status'];
	
	
					$allowed = mysqli_query($conn,"UPDATE phd_details SET `Name_of_topic`='$nameoftopic',`Name_of_guide`='$nameofguide',
					`College_name`='$phdcollege',`University`='$phduniversity',`Registration_no`='$registrationno',
					`Upload_letterORdegree`='$uploadletter',`year_of_obtaining`='$yearofobtaining', 'status'='$status' WHERE
					`UID`='$uid' AND 'phdID'='".$_GET['id']."' ");

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
					<input type="text" name="nameoftpc" class="form-control" id="nameof_tpc" autocomplete="off" value='<?php echo $nameoftopic; ?>' >
					<span id="nameoftpc_span" class="text-danger"> </span>
				</div>
                <div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="name_of_guide" class="font-weight-bold"> Name of Guide: </label>
					<input type="text" name="nameofguide" class="form-control" id="nameof_guide" autocomplete="off" value='<?php echo $nameofguide; ?>'>
					<span id="nameofguide_span" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="phd_college" class="font-weight-bold"> College Name: </label>
					<input type="text" name="phdcollege" class="form-control" id="phd_college" autocomplete="off" value='<?php echo $phdcollege; ?>' >
					<span id="phdcollege_span" class="text-danger"> </span>
				</div>
                <div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="phd_university" class="font-weight-bold"> University: </label>
					<input type="text" name="phduniversity" class="form-control" id="phd_university" autocomplete="off" value='<?php echo $phduniversity; ?>'>
					<span id="phduniversity_span" class="text-danger"> </span>
				</div>
				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label class="font-weight-bold">PhD Status :</label>
                    <select class="form-control" id="phd_status" name="phd_status" onchange="ShowHideDiv()">
                    <option value="persuing" <?php if($status=="persuing"){ ?> selected <?php } ?> >Pursuing</option>
    				<option value="completed" <?php if($status=="completed"){ ?> selected <?php } ?> >Completed</option>
  					</select>
				</div>	

				<div class="form-group col-lg-11 col-md-11 col-xs-11"  id="registrationNo" style="display:none">
					<label for="registrationno" class="font-weight-bold"> Registration No.: </label>
					<input type="text" name="regno" class="form-control" id="reg_no" autocomplete="off" value='<?php echo $registrationno; ?>'>
					<span id="registrationno_span" class="text-danger"> </span>
				</div>
				
                <form action="upload_file.php" method="post" enctype="multipart/form-data">
				<label for="uploadletter"  class="font-weight-bold">Upload Registration letter\degree: </label>
                   <input type="file" name="file1" size="50" <?php echo $uploadletter; ?> />
                             
                <div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="yearofobtaining" class="font-weight-bold"> Year of Obtaining phD: </label>
					<input type="text" name="yobphd" class="form-control" id="yob_phd" autocomplete="off" value='<?php echo $yearofobtaining; ?>'>
					<span id="yearofobtaining_span" class="text-danger"></span>
				</div>

				<center><input type="submit" name="Save" value="submit" class="btn btn-info" autocomplete="off"></center>

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