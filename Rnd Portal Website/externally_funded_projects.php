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

$uid_efp = $_SESSION['uid'];

if(isset($_POST['submit'])){
	
	$chars = "0123456789abcdefghijklmnopqrstuvwxyz";
    $efp_id = substr( str_shuffle( $chars ), 0, 7 );
    $projecttitle= $_POST['projecttitle'];
	$department= $_POST['department_of_project'];
	$principalinvname= $_POST['principalinv_name'];
	$sponsorname= $_POST['sponsor_name'];
    $belonging= $_POST['belonging'];
	$projectstatus= $_POST['project_status'];
	$pfund= $_POST['p_fund'];
	$ownership= $_POST['ownership_type'];
	$joint= $_POST['joint'];
	$joint2= $_POST['joint2'];
	$startday= $_POST['start_day'];
	$startmonth= $_POST['start_month'];
	$startyear= $_POST['start_year'];
	$endday= $_POST['end_day'];
	$endmonth= $_POST['end_month'];
	$endyear= $_POST['end_year'];

	$query_dupl = mysqli_query($conn, "SELECT * FROM externally_funded_projects WHERE EFP_ID='$efp_id'");

			if(mysqli_num_rows($query_dupl) > 0 ) { //check if there is already an entry for that username
				echo"<br>";
				echo "<font color=red size=4 >";
				echo"<center><b>";
				echo "Sorry fo the inconvenience, Please try again!";
				echo"</b></center>";
			}
			else{
	
					$allowed = mysqli_query($conn,"INSERT INTO externally_funded_projects(Project_Title, Department, Name_of_principal_investigator, 
					SponsoredBy, Belongs_to_COE, Project_Status, Total_Project_Fund, Ownership_type, Joint_with, Joint_Belongs_to, Day_start, Month_start, 
					Year_start, Day_end, Month_end, Year_end, EFP_ID, UID)
					VALUES ('$projecttitle','$department','$principalinvname','$sponsorname','$belonging','$projectstatus',
					'$pfund','$ownership','$joint','$joint2','$startday','$startmonth','$startyear','$endday','$endmonth','$endyear','$efp_id','$uid_efp')");
}
}
$conn->close();
?>





<!DOCTYPE html>
<html>
<head>
	<title>Externally Funded Projects | R&D Department | Government College of Engineering, Amravati.</title>
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
		<div class="col-lg-9 m-auto d-block">
			
		
			
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" class="form-control z-depth-4" onsubmit="return validation()">
				<div style="padding-top: 30px;"></div>
				
				<div class="form-group col-lg-11 col-md-11 col-xs-11">
				<h4 class="font-weight-bold"> Externally Funded Projects</h4>
					<label for="Project_title" class="font-weight-bold"> Project Title: </label>
					<input type="text" name="projecttitle" class="form-control" id="p_title" autocomplete="off">
					<span id="project_title" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label class="font-weight-bold">Department of Project Work:</label>
                    <select class="form-control" id="select_1" name="department_of_project">
                    <option value=" ">Select Department </option>
                    <option value="Computer Science And Engineering">Computer Science And Engineering</option>
    				<option value="Information Technology">Information Technology</option>
    				<option value="Instrumentation Engineering">Instrumentation Engineering</option>
    				<option value="Electronics And Telecommunication Engineering">Electronics And Telecommunication Engineering</option>
    				<option value="Electrical Engineering">Electrical Engineering</option>
    				<option value="Civil Engineering">Civil Engineering</option>
    				<option value="Mechanical Engineering">Mechanical Engineering</option>
					<option value="Applied Mechanics">Applied Mechanics</option>
    				<option value="Applied Physics">Applied Physics</option>
    				<option value="Applied Chemistry">Applied Chemistry</option>
					<option value="Engineering mathematics">Engineering mathematics</option>
  					</select>
				</div>
					<span id="select1_span" class="text-danger"></span>



				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="pi_name" class="font-weight-bold"> Name of Pricipal Investigator: </label>
					<input type="text" name="principalinv_name" class="form-control" id="Pinv_name" autocomplete="off">
					<span id="PI_name" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="sponsor" class="font-weight-bold"> Sponsored By: </label>
					<input type="text" name="sponsor_name" class="form-control" id="sponsorby_name" autocomplete="off">
					<span id="sponsor_span" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label class="font-weight-bold"> Does Project belongs to college of Engineering?  </label>
					<div class="radio">
                    <label><input type="radio" name="belonging" value="Yes" id="belong">Yes</label>
                     </div>
                   <div class="radio">
                        <label><input type="radio" name="belonging" value="No" id="belong">No</label>
                     </div>
				</div>
					<span id="belongs" class="text-danger"></span>

				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label class="font-weight-bold">Project Status:</label>
                    <select class="form-control" id="select_2" name="project_status" >
                    <option value=" ">Select Project Status </option>
                    <option value="Completed">Completed</option>
    				<option value="In progress">In Progress</option>
  					</select>
				</div>
					<span id="status_span" class="text-danger"></span>

				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label class="font-weight-bold"> Total Project Fund: </label>
					<input type="text" name="p_fund" class="form-control" id="projectfund" autocomplete="off">
					<span id="projectfund_span" class="text-danger"> </span>
				</div>
				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label class="font-weight-bold"> Type of Ownership?  </label>
					<div class="radio">
                    <label><input type="radio" name="ownership_type" value="Joint" id="belong">Joint</label>
                     </div>
                   <div class="radio">
                        <label><input type="radio" name="ownership_type" value="Independent" id="belong">Independent</label>
                     </div>
				</div>
					<span id="ownershiptype_span" class="text-danger"></span>


				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label class="font-weight-bold"> Joint with(Institute name if any): </label>
                    <input type="text" name="joint" class="form-control" id="jnt" autocomplete="off">
					<span id="join_span" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label class="font-weight-bold"> Joint Belongs to(Client/Industry if any): </label>
                    <input type="text" name="joint2" class="form-control" id="jnt2" autocomplete="off">
					<span id="join2_span" class="text-danger"> </span>
				</div>

				<div class="row">				
				<div class="form-group col-lg-4 col-md-4 col-xs-4">
					<label class="font-weight-bold"> Date of Start of  Project Work : </label><br>  
					<input type="date" name="">
				</div>
				</div>


				<div class="row">				
				<div class="form-group col-lg-4 col-md-4 col-xs-4">
					<label class="font-weight-bold"> Date of Completion of Project : </label><br>  
					<select class="1-31" name="end_day" id="day" <?php for ($x = 1; $x <= 31; $x++){ if($endday==$x){?> selected <?php }} ?> >
						<option >Day</option>
					</select>
					
					<select class="1-12" name="end_month"  id="month" >
						<option>Month</option>
					</select>

                   
					<select class="1900-2019" name="end_year"  id="year" >
						<option>Year</option>
					</select>
				</div>
				</div>


				<center><input type="submit" name="submit" value="submit" class="btn btn-info" autocomplete="off"></center>
				<div style="padding-top: 40px;"></div>

			</form>
	</div>



<!--JAVASCRIPT-->
	<script type="text/javascript">
		

		function validation(){

			var p_title = document.getElementById('p_title').value;
			var Pinv_name = document.getElementById('Pinv_name').value;
			var sponsorby_name = document.getElementById('sponsorby_name').value;
			var projectfund = document.getElementById('projectfund').value;
			var date1 = document.getElementById('date1').value;
			var date2 = document.getElementById('date2').value;
			var own = document.getElementById('own').value;






			if(p_title == ""){
				document.getElementById('project_title').innerHTML =" **Please fill the Project Title field";
				return false;
			}
			if((p_title.length <= 2) || (p_title.length > 30)) {
				document.getElementById('project_title').innerHTML =" **Lenght must be between 2 and 30";
				return false;	
			}



			if(Pinv_name == ""){
				document.getElementById('PI_name').innerHTML =" **Please fill the Principal Investigator field";
				return false;
			}
			if((Pinv_name.lenght <= 2) || (Pinv_name.length > 20)) {
				document.getElementById('PI_name').innerHTML =" **Lenght must be between 2 and 20";
				return false;	
			}
			if(!isNaN(Pinv_name)){
				document.getElementById('PI_name').innerHTML =" **Only characters are allowed";
				return false;
			}



			if(sponsorby_name == ""){
				document.getElementById('sponsor_span').innerHTML ="**Please fill the sponsor name field ";
				return false;
			}
			if(!isNaN(sponsorby_name)){
				document.getElementById('sponsor_span').innerHTML ="**Only characters are allowed";
				return false;
			}


			if(projectfund == ""){
				document.getElementById('projectfund_span').innerHTML =" **Please fill the Total Project Fund field";
				return false;
			}
			if(isNaN(projectfund)){
				document.getElementById('projectfund_span').innerHTML =" **Only digits are allowed";
				return false;
			}


			if(date1 == ""){
				document.getElementById('dates1').innerHTML ="**Please enter a valid date (if date not known then you can specify the 1 date of the month)";
				return false;
			}


			if(date2 == ""){
				document.getElementById('dates2').innerHTML ="**Please enter a valid date (if date not known then you can specify the 1 date of the month)";
				return false;
			}



			if(own == ""){
				document.getElementById('Owner_span').innerHTML =" **Please fill the Ownership field";
				return false;
			}
			if(!isNaN(own)){
				document.getElementById('Owner_span').innerHTML =" **Only characters are allowed";
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




