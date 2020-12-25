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

$userprofile = $_SESSION['user'];
$query = "SELECT * FROM new_registration WHERE username = '$userprofile'";
$data = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($data);
$_SESSION['uid'] = $result['UID'];


$sql_qual = "SELECT * FROM qualification_details where UID = '".$_SESSION['uid']."' ";

$result_qual = $conn->query($sql_qual);

while($row = $result_qual->fetch_assoc()) {

	$degree = $row['Degree_name'];
}

$sql = "SELECT * FROM p_info where UID = '".$_SESSION['uid']."' ";
                                   

$result = $conn->query($sql);

while($rowval = $result->fetch_assoc()) {
$firstname= $rowval['Firstname'];
$middlename= $rowval['Middlename'];
$lastname= $rowval['Lastname'];
$dob1= $rowval['dateofbirth'];
$department= $rowval['Department'];
$designation= $rowval['Designation'];
$mobile= $rowval['Mobile'];
$office= $rowval['Office'];
$email= $rowval['Email_id'];
$qualification= $rowval['Qualification'];
$Gender= $rowval['Gender'];
$address= $rowval['Address'];
$dateofjoin= $rowval['Date_of_joining'];
$photo= $rowval['Upload_photo'];
$seevarth= $rowval['SeevarthNumber'];
$aadhar= $rowval['AadharNumber'];
$pannumber= $rowval['PANnumber'];
};

			if(isset($_POST['Save'])){ 

$firstname_edit= $_POST['fname'];
$middlename_edit= $_POST['mname'];
$lastname_edit= $_POST['lname'];
$department_edit= $_POST['Department'];
$designation_edit= $_POST['Designation'];
$mobile_edit= $_POST['mobile'];
$office_edit= $_POST['officeno'];
$email_edit= $_POST['email'];
$DateofBirth= $_POST['dob'];
$address_edit= $_POST['residential_address'];
$dateofjoin_edit= $_POST['doj'];
$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
$seevarth_edit = $_POST['seevarth'];
$aadhar_edit = $_POST['aadhar'];
$pannumber_edit = $_POST['panno'];

			    $allowed = mysqli_query($conn,"UPDATE p_info SET `Firstname`='$firstname_edit',`Middlename`='$middlename_edit',`Lastname`='$lastname_edit',`dateofbirth`='$DateofBirth',`Department`='$department_edit',`Designation`='$designation_edit',`Mobile`='$mobile_edit',`Office`='$office_edit',`Email_id`='$email_edit',`Address`='$address_edit',`Date_of_joining`='$dateofjoin_edit',`Upload_photo`='$file', `SeevarthNumber`='$seevarth_edit',`AadharNumber`='$aadhar_edit',`PANnumber`='$pannumber_edit' WHERE UID = '".$_SESSION['uid']."' ");

			    mysqli_query($conn, "UPDATE `new_registration` SET `firstname`='$firstname_edit',`middlename`='$middlename_edit',`lastname`='$lastname_edit',`department`='$department_edit',`designation`='$designation_edit' WHERE UID = '".$_SESSION['uid']."' ");
			}

$conn->close();
?>



<!DOCTYPE html>
<html>
<head>
	<title>Personal Information | Principal | R&D Department | Government College of Engineering, Amravati.</title>
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

	<div style="padding-bottom: 5px; padding-top: 3px; padding-left: 5px; padding-right: 5px;">
		
		<div>

			<div style="padding-left: 1010px;" class="col-lg-2 col-md-2 col-xs-2"><input type="submit" class="btn bg-primary" name="Edit" id="Edit" value="Edit" onclick="enable()"></div>

			<script>
				function enable() {
				document.getElementById("f_name").disabled = false;
				document.getElementById("m_name").disabled = false;
				document.getElementById("l_name").disabled = false;
				document.getElementById("address").disabled = false;
				document.getElementById("sel4").disabled = false;
				document.getElementById("date2").disabled = false;
				document.getElementById("mobileNumber").disabled = false;
				document.getElementById("officeNumber").disabled = false;
				document.getElementById("emails").disabled = false;
				document.getElementById("seevarthNumber").disabled = false;
				document.getElementById("aadharNumber").disabled = false;
				document.getElementById("panno").disabled = false;
				document.getElementById("sbmit").disabled = false;
				document.getElementById("sbmit").hidden = false;
				document.getElementById("image").hidden = false;
				document.getElementById("cancel").hidden = false;
				document.getElementById("cancel").disabled = false;
				document.getElementById("Edit").disabled = true;
				document.getElementById("Edit").hidden = true;
				document.getElementById("select_des").disabled = false;
				document.getElementById("date1").disabled = false;
				document.getElementById("qual_link").hidden = false;
				}

				function cancel() {
				document.getElementById("f_name").disabled = true;
				document.getElementById("m_name").disabled = true;
				document.getElementById("l_name").disabled = true;
				document.getElementById("address").disabled = true;
				document.getElementById("sel4").disabled = true;
				document.getElementById("date2").disabled = true;
				document.getElementById("mobileNumber").disabled = true;
				document.getElementById("officeNumber").disabled = true;
				document.getElementById("emails").disabled = true;
				document.getElementById("seevarthNumber").disabled = true;
				document.getElementById("aadharNumber").disabled = true;
				document.getElementById("panno").disabled = true;
				document.getElementById("sbmit").disabled = true;
				document.getElementById("sbmit").hidden = true;
				document.getElementById("image").hidden = true;
				document.getElementById("cancel").hidden = true;
				document.getElementById("cancel").disabled = true;
				document.getElementById("Edit").disabled = true;
				document.getElementById("select_des").disabled = true;
				document.getElementById("date1").disabled = true;
				document.getElementById("qual_link").hidden = true;
				}
			</script>

			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" class="form-control" onsubmit="return validation()" enctype="multipart/form-data" style="border: none;">

                <div class="form-group bg-form col-lg-7 col-md-7 col-xs-7">
                    <div class="img-section">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode( $photo ); ?>" class="imgCircle" height="200" width="200" class="img-thumnail" style="padding-left: 15px;" />
                </div> 
                <div class="form-group col-lg-5 col-md-5 col-xs-5">
                    <input type="file" id="image" class="form-control form-input Profile-input-file" name="image" hidden="true">
                </div>           
            </div>
				
<div class="row">
				<div class="form-group col-lg-4 col-md-4 col-xs-4">
					<label for="fi_name" class="font-weight-bold"> First Name: </label>
					<input type="text" name="fname" class="form-control" id="f_name"  autocomplete="off" disabled="true" value='<?php echo  $firstname; ?>' >
					<span id="first_name" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-4 col-md-4 col-xs-4">
					<label for="mi_name" class="font-weight-bold"> Middle Name: </label>
					<input type="text" name="mname" class="form-control" id="m_name" autocomplete="off"  value='<?php echo  $middlename; ?>' disabled="true">
					<span id="middle_name" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-4 col-md-4 col-xs-4">
					<label for="la_name" class="font-weight-bold"> Last Name: </label>
					<input type="text" name="lname" class="form-control" id="l_name" autocomplete="off"  value='<?php echo  $lastname; ?>' disabled="true">
					<span id="last_name" class="text-danger"> </span>
				</div>
</div>
<div class="row">
				<div class="form-group col-lg-4 col-md-4 col-xs-4">
					<label class="font-weight-bold"> Date of Birth : </label><br>  
					<input type="date" name="dob" id="date1" disabled="true" value='<?php echo  $dob1; ?>' >
				</div>

				<div class="form-group col-lg-4 col-md-4 col-xs-4">
					<label class="font-weight-bold"> Qualification: </label>
					<input type="text" class="form-control" name="qualification" disabled value="<?php echo $degree; ?>" > 
					<span hidden="true" id="qual_link"><a href="qualtab.php">Click here to enter qualification details</a></span>
				</div>
					<span id="qual" class="text-danger"></span>


				<div class="form-group col-lg-4 col-md-4 col-xs-4">
					<label class="font-weight-bold"> Residential Address: </label>
					<textarea class="form-control" id="address" name="residential_address" rows="3" autocomplete="off" disabled="true"> <?php echo $address; ?> </textarea>
					<span id="res_add" class="text-danger"> </span>
				</div>
</div>

<div class="row">
				<div class="form-group col-lg-4 col-md-4 col-xs-4">
					<label class="font-weight-bold">Department :</label>
                    <select class="form-control" id="sel4" name="Department" disabled="true">
                    <option value="Computer Science And Engineering" <?php if($department=="Computer Science And Engineering"){?> selected <?php } ?> >Computer Science And Engineering</option>
    				<option value="Information Technology" <?php if($department=="Information Technology"){?> selected <?php } ?> >Information Technology</option>
    				<option value="Instrumentation Engineering" <?php if($department=="Instrumentation Engineering"){?> selected <?php } ?> >Instrumentation Engineering</option>
    				<option value="Electronics And Telecommunication Technology" <?php if($department=="Electronics And Telecommunication Technology"){?> selected <?php } ?> >Electronics And Telecommunication Engineering</option>
    				<option value="Electrical Engineering" <?php if($department=="Electrical Engineering"){?> selected <?php } ?> >Electrical Engineering</option>
    				<option value="Civil Engineering" <?php if($department=="Civil Engineering"){?> selected <?php } ?> >Civil Engineering</option>
    				<option value="Mechanical Engineering" <?php if($department=="Mechanical Engineering"){?> selected <?php } ?> >Mechanical Engineering</option>
    				<option value="Applied Mechanics" <?php if($department=="Applied Mechanics"){?> selected <?php } ?> >Applied Mechanics</option>
    				<option value="Applied Chemistry" <?php if($department=="Applied Chemistry"){?> selected <?php } ?> >Applied Chemistry</option>
    				<option value="Applied Physics" <?php if($department=="Applied Physics"){?> selected <?php } ?> >Applied Physics</option>
    				<option value="Engineering Mathematics" <?php if($department=="Engineering Mathematics"){?> selected <?php } ?> >Engineering Mathematics</option>
  					</select>
				</div>

				<div class="form-group col-lg-4 col-md-4 col-xs-4">
					<label class="font-weight-bold">Designation :</label>
                    <select class="form-control" id="select_des" name="Designation" disabled="true">
                    <option value="Lecturer" <?php if($designation=="Lecturer"){?> selected <?php } ?> >Lecturer</option>
                    <option value="Assistant Professor" <?php if($designation=="Assistant Professor"){?> selected <?php } ?> >Assistant Professor</option>
                    <option value="Associate Professor" <?php if($designation=="Associate Professor"){?> selected <?php } ?> >Associate Professor</option>
                    <option value="Professor" <?php if($designation=="Professor"){?> selected <?php } ?> >Professor</option>
                    </select>
</div>

				<div class="form-group col-lg-4 col-md-4 col-xs-4">
					<label class="font-weight-bold"> Date Of Joining Institute: </label><br>
					<input type="date" name="doj" id="date2" disabled="true"  value='<?php echo  $dateofjoin; ?>' ><br>
					<span id="dates2" class="text-danger"></span>
				</div>
</div>

<div class="row">
				<div class="form-group col-lg-4 col-md-4 col-xs-4">
					<label class="font-weight-bold"> Mobile Number: </label>
					<input type="text" name="mobile" class="form-control" id="mobileNumber" autocomplete="off"  value='<?php echo  $mobile; ?>' disabled="true">
					<span id="mobileno" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-4 col-md-4 col-xs-4">
					<label class="font-weight-bold"> Office Number: </label>
					<input type="text" name="officeno" class="form-control" id="officeNumber" autocomplete="off"  value='<?php echo  $office; ?>' disabled="true">
					<span id="officeno_span" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-4 col-md-4 col-xs-4">
					<label class="font-weight-bold"> Email: </label>
					<input type="text" name="email" class="form-control" id="emails" autocomplete="off"  value='<?php echo  $email; ?>' disabled="true">
					<span id="emailids" class="text-danger"> </span>
				</div>
</div>

<div class="row">				
				

				<div class="form-group col-lg-4 col-md-4 col-xs-4">
					<label class="font-weight-bold"> Sevaarth Number/Employee ID: </label>
					<input type="text" name="seevarth" class="form-control" id="seevarthNumber" value='<?php echo  $seevarth; ?>' autocomplete="off" disabled="true">
					<span id="seevarth_span" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-4 col-md-4 col-xs-4">
					<label class="font-weight-bold"> Aadhar Number(Optional): </label>
					<input type="text" name="aadhar" class="form-control" id="aadharNumber" value='<?php echo  $aadhar; ?>' autocomplete="off" disabled="true">
					<span id="aadhar_span" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-4 col-md-4 col-xs-4">
					<label class="font-weight-bold"> PAN Number:  </label>

					<input type="text" name="panno" class="form-control" id="panno" value='<?php echo  $pannumber; ?>' autocomplete="off" disabled="true">
					<span id="panno" class="text-danger"> </span>
				</div>
</div>

						<center><input type="submit" class="btn bg-success" name="Save" id="sbmit" value="Save" disabled="true" hidden="true" onclick="location.reload();">
								<input type="submit" class="btn bg-danger" name="Cancel" id="cancel" value="Cancel" disabled="true" hidden="true" onclick="cancel()">
						</center>

				</div>

</div>
<!---Button was here-->
			</div>
			</form>
		</div>
	</div>

<!--photo loader-->
	<script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                 
           }  
      });  
 });  
 </script>
 <!--photo loader-->


<!--JAVASCRIPT-->
	<script type="text/javascript">
		

		function validation(){

			var f_name = document.getElementById('f_name').value;
			var m_name = document.getElementById('m_name').value;
			var l_name = document.getElementById('l_name').value;
			var mobileNumber = document.getElementById('mobileNumber').value;
			var officeNumber = document.getElementById('officeNumber').value;
			var emails = document.getElementById('emails').value;
			var date1 = document.getElementById('date1').value;
			var address = document.getElementById('address').value;
			var aadharNumber = document.getElementById('aadharNumber').value;



			if(f_name == ""){
				document.getElementById('first_name').innerHTML =" **Please fill the First name field";
				return false;
			}
			if((f_name.length <= 1) || (f_name.length > 30)) {
				document.getElementById('first_name').innerHTML =" **Lenght must be between 1 and 30";
				return false;	
			}
			if(!isNaN(f_name)){
				document.getElementById('first_name').innerHTML =" **Only characters are allowed";
				return false;
			}


			if(m_name == ""){
				document.getElementById('middle_name').innerHTML =" **Please fill the Middle name field";
				return false;
			}
			if((m_name.length <= 1) || (m_name.length > 30)) {
				document.getElementById('middle_name').innerHTML =" **Lenght must be between 1 and 30";
				return false;	
			}
			if(!isNaN(m_name)){
				document.getElementById('middle_name').innerHTML =" **Only characters are allowed";
				return false;
			}


			if(l_name == ""){
				document.getElementById('last_name').innerHTML =" **Please fill the Last name field";
				return false;
			}
			if((l_name.length <= 1) || (l_name.length > 30)) {
				document.getElementById('last_name').innerHTML =" **Lenght must be between 1 and 30";
				return false;	
			}
			if(!isNaN(l_name)){
				document.getElementById('last_name').innerHTML =" **Only characters are allowed";
				return false;
			}


			if (mobileNumber != "") {
				if(isNaN(mobileNumber)){
				document.getElementById('mobileno').innerHTML =" **Only digits are allowed";
				return false;
			}
				if(mobileNumber.length!=10){
				document.getElementById('mobileno').innerHTML =" **Mobile Number must be 10 digits only";
				return false;
			}
		}


			if(officeNumber != ""){
				if(isNaN(officeNumber)){
				document.getElementById('officeno_span').innerHTML =" **Only digits are allowed";
				return false;
			}
				if(officeNumber.length!=11){
				document.getElementById('officeno_span').innerHTML =" **Landline number must be 11 digits only (with PIN Code)";
				return false;
			}
			}


			if(emails != ""){
			if(emails.indexOf('@') <= 0 ){
				document.getElementById('emailids').innerHTML =" **@ Invalid Position";
				return false;
			}
			if((emails.charAt(emails.length-4)!='.') && (emails.charAt(emails.length-3)!='.')){
				document.getElementById('emailids').innerHTML =" **. Invalid Position";
				return false;
			}
		}

			if(date1 != ""){
			if(date1 == ""){
				document.getElementById('dates1').innerHTML =" **Please enter a valid date";
				return false;
			}
		}


			if(aadharNumber != ""){
				if(isNaN(aadharNumber)){
				document.getElementById('aadhar_span').innerHTML =" **Only digits are allowed";
				return false;
			}
				if(aadharNumber.length!=12){
				document.getElementById('aadhar_span').innerHTML =" **Aadhar Number must be 12 digits without spaces";
				return false;
			}
			}

			
		}

	</script>

<!--JAVASCRIPT-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>