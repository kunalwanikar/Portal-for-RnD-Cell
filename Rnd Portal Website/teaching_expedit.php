<?php
//session_start();
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
$userprofile= $_SESSION['user'];
$query = "SELECT * FROM new_registration WHERE Username = '$userprofile'";
$data = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($data);
$_SESSION['uid'] = $result['UID'];


$sql = "SELECT * FROM experience_teaching where UID = '.$_SESSION['uid'].' and year_join = '$_GET[id]'";
                                   

$res = $conn->query($sql);

while($rowval = $res->fetch_assoc()) {

	$designation= $rowval['Appointed_as'];
	$degree= $rowval['Degree_level'];
	$tcollegename= $rowval['College_name'];
	$department= $rowval['Department'];
	$joinday= $rowval['day_join'];
	$joinmonth= $rowval['month_join'];
	$joinyear= $rowval['year_join'];
	$leaveday= $rowval['day_leave'];
	$leavemonth= $rowval['month_leave'];
	$leaveyear= $rowval['year_leave'];
	$expyr= $rowval['Exp_yr'];
	$expmonth= $rowval['Exp_month'];
	
	};
if(isset($_POST['submit'])){
	
    $designation= $_POST['designation'];
	$degree= $_POST['degree'];
	$tcollegename= $_POST['tcollegename'];
	$department= $_POST['Department'];
	$joinday= $_POST['join_day'];
	$joinmonth= $_POST['join_month'];
	$joinyear= $_POST['join_year'];
	$leaveday= $_POST['leave_day'];
	$leavemonth= $_POST['leave_month'];
	$leaveyear= $_POST['leave_year'];
	$expyr= $_POST['expyr'];
	$expmonth= $_POST['expmonth'];
				   
				   $allowed = mysqli_query($conn,"UPDATE patents SET `Appointed_as`='$designation',
				   `Degree_level`='$degree',`College_name`='$tcollegename',
				   `Department`='$department',`day_join`='$joinday',`month_join`='$joinmonth',
				   `year_join`='$joinyear',`day_leave`='$leaveday',`month_leave`='$leavemonth',
				   `year_leave`='$leaveyear',`Exp_yr`='$expyr',`Exp_month`='$expmonth',
				   `UID`='$UID'");
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
                <h4 class="font-weight-bold"> Teaching Experience</h4>
				

				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="Appointed as" class="font-weight-bold"> Designation: </label>
					<input type="text" name="designation" class="form-control" id="t_designation" autocomplete="off" value='<?php echo $designation; ?>'>
					<span id="designation_span" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="degree_level" class="font-weight-bold">Degree Level: </label>
					<select class="form-control" id="deg_level" name="degree">
					<option value="Under Graduate" <?php if($degree=="Under Graduate"){?> selected <?php } ?>>Under Graduate</option>
    				<option value="Post Graduate" <?php if($degree=="Post Graduate"){?> selected <?php } ?>>Post Graduate</option>
					</select>
					
				</div>

				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="collegename" class="font-weight-bold"> College Name: </label>
					<input type="text" name="tcollegename" class="form-control" id="t_college" autocomplete="off" value='<?php echo $tcollegename; ?>'>
					<span id="collegename_span" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label class="font-weight-bold">Department :</label>
                    <select class="form-control" id="sel4" name="Department">
                    <option value="">Select Department</option>
					<option value="Computer Science And Engineering" <?php if($department=="Computer Science And Engineering"){?> selected <?php } ?> >Computer Science And Engineering</option>
    				<option value="Information Technology" <?php if($department=="Information Technology"){?> selected <?php } ?>  >Information Technology</option>
    				<option value="Instrumentation Engineering" <?php if($department=="Instrumentation Engineering"){?> selected <?php } ?> >Instrumentation Engineering</option>
    				<option value="Electronics And Telecommunication Engineering" <?php if($department=="Electronics And Telecommunication Technology"){?> selected <?php } ?> >Electronics And Telecommunication Engineering</option>
    				<option value="Electrical Engineering" <?php if($department=="Electrical Engineering"){?> selected <?php } ?>>Electrical Engineering</option>
    				<option value="Civil Engineering"  <?php if($department=="Civil Engineering"){?> selected <?php } ?> >Civil Engineering</option>
    				<option value="Mechanical Engineering" <?php if($department=="Mechanical Engineering"){?> selected <?php } ?>>Mechanical Engineering</option>
					<option value="Applied Mechanics" <?php if($department=="Applied Mechanics"){?> selected <?php } ?>>Applied Mechanics</option>
    				<option value="Applied Physics" <?php if($department=="Applied Physics"){?> selected <?php } ?>>Applied Physics</option>
    				<option value="Applied Chemistry" <?php if($department=="Applied Chemistry"){?> selected <?php } ?>>Applied Chemistry</option>
					<option value="Engineering mathematics" <?php if($department=="Engineering mathematics"){?> selected <?php } ?>>Engineering mathematics</option>
  					</select>
				</div>
				<div class="row">				
				<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label class="font-weight-bold"> Date of Joining Institute : </label><br>  
					<select class="1-31" name="join_day"  id="day" <?php for ($x = 1; $x <= 31; $x++){ if($day_birth==$x){?> selected <?php }} ?> >
						<option >Day</option>
					</select>
					
					<select class="1-12" name="join_month"  id="month" >
						<option>Month</option>
					</select>

                   
					<select class="1900-2019" name="join_year"  id="year" >
						<option>Year</option>
					</select>
				</div>
				
			
				<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label class="font-weight-bold"> Date of Leaving Institute : </label><br>  
					<select class="1-31" name="leave_day"  id="day1" <?php for ($x = 1; $x <= 31; $x++){ if($day_birth==$x){?> selected <?php }} ?> >
						<option >Day</option>
					</select>
					
					<select class="1-12" name="leave_month"  id="month1" >
						<option>Month</option>
					</select>

                   
					<select class="1900-2019" name="leave_year"  id="year1" >
						<option>Year</option>
					</select>
				</div>
				</div>
	            <div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="experienceinyear" class="font-weight-bold"> Experience in years: </label>
					<input type="text" name="expyr" class="form-control" id="exp_yr" autocomplete="off" value='<?php echo $expyr; ?>'>
					<span id="experienceinyear_span" class="text-danger"> </span>
				</div>
				  <div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="experienceinmonth" class="font-weight-bold"> Experience in months: </label>
					<input type="text" name="expmonth" class="form-control" id="exp_month" autocomplete="off" value='<?php echo $expmonth; ?>'>
					<span id="experienceinmonth_span" class="text-danger"> </span>
				</div>
				


               
				<center><input type="submit" name="submit" value="submit" class="btn btn-info" autocomplete="off"></center>
				<div style="padding-top: 40px;"></div>
							

				
			</form>
		</div>
	</div>


<!--JAVASCRIPT-->
	<script type="text/javascript">
		

		function validation(){

			var designation = document.getElementById('t_designation').value;
			var degree = document.getElementById('deg_level').value;
			var tcollegename = document.getElementById('t_college').value;
			var day = document.getElementById('day').value;
			var month = document.getElementById('month').value;
			var year = document.getElementById('year').value;
			var day1 = document.getElementById('day1').value;
			var month1 = document.getElementById('month1').value;
			var year1 = document.getElementById('year1').value;
			var expyr = document.getElementById('exp_yr').value;
			var expmonth = document.getElementById('exp_month').value;
			
            if(designation == ""){
				document.getElementById('designation_span').innerHTML =" **Please fill the appointed as field";
				return false;
			}
			if(!isNaN(designation)){
				document.getElementById('designation_span').innerHTML =" **Only characters are allowed";
				return false;
			}
            if(tcollegename == ""){
				document.getElementById('collgename_span').innerHTML =" **Please fill the college name field";
				return false;
			}
			if(!isNaN(tcollegename)){
				document.getElementById('collegename_span').innerHTML =" **Only characters are allowed";
				return false;
			}
			
			
            if(expyr == ""){
				document.getElementById('experienceinyear_span').innerHTML =" **Please fill the Experience in  year field in decimal ";
				return false;
			}
			if(isNaN(expyr)){
				document.getElementById('experienceinyear_span').innerHTML =" **Only numbers are allowed";
				return false;
			}
			
			if(expmonth == ""){
				document.getElementById('experienceinmonth_span').innerHTML =" **Please fill the experience in month field";
				return false
			}
			if(isNaN(expmonth)){
				document.getElementById('experienceinmonth_span').innerHTML =" **Only numbers are allowed";
				return false;
			}
			
			
			
		}

	</script>
	<script>
	
	$(function(){
var $select_month = $(".1-12");
for (i=1;i<=12;i++){
	$select_month.append($('<option></option>').val(i).html(i))
}
});

	$(function(){
var $select_day = $(".1-31");
for (i=1;i<=31;i++){
	$select_day.append($('<option></option>').val(i).html(i))
}
});


	$(function(){
var $select_year = $(".1900-2019");
for (i=2019;i>=1900;i--){
	$select_year.append($('<option></option>').val(i).html(i))
}
});

</script>
<!--JAVASCRIPT-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>