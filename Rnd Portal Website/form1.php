
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


?>

<!DOCTYPE html>
<html>
<head>
	<title>Report</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.6.1/css/mdb.min.css" rel="stylesheet">

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
<form class="form-control z-depth-4" method="post" action="form2.php">
 
<div style="padding-top: 30px;">
  
	
         <div class="form-group offset-1 " id= "chk">
					<label class="font-weight-bold"> Please Select Department :</label>
                             
                            <div class="checkbox font-weight-bold">
                            <input type="button" onclick="checkAll2()" class="btn btn-link" value="Select All">
                            <input type="button" onclick="uncheckAll2()" class="btn btn-link" value="Select None">
                            </div>
                            <div class="row">
                                <div class="checkbox col-lg-6 col-md-6 col-xs-6 font-weight-bold">
                                <label><input type="checkbox" name="chk[]" class="check2" value="Computer Science And Engineering">Computer Science And Engineering</label>
                                </div>
                                <div class="checkbox col-lg-6 col-md-6 col-xs-6 font-weight-bold">
                                <label><input type="checkbox" name="chk[]" class="check2" value="Information Technology">Information Technology</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="checkbox col-lg-6 col-md-6 col-xs-6 font-weight-bold">
                                <label><input type="checkbox" name="chk[]" class="check2" value="Instrumentation Engineering">Instrumentation Engineering</label>
                                </div>
                                <div class="checkbox col-lg-6 col-md-6 col-xs-6 font-weight-bold">
                                <label><input type="checkbox" name="chk[]" class="check2" value="Electronics And Telecommunication Engineering">Electronics And Telecommunication Engineering</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="checkbox col-lg-6 col-md-6 col-xs-6 font-weight-bold">
                                <label><input type="checkbox" name="chk[]" class="check2" value="Electrical Engineering">Electrical Engineering</label>
                                </div>
                                <div class="checkbox col-lg-6 col-md-6 col-xs-6 font-weight-bold">
                                <label><input type="checkbox" name="chk[]" class="check2" value="Civil Engineering">Civil Engineering</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="checkbox col-lg-6 col-md-6 col-xs-6 font-weight-bold">
                                <label><input type="checkbox" name="chk[]" class="check2" value="Mechanical Engineering">Mechanical Engineering</label>
                                </div>
                                <div class="checkbox col-lg-6 col-md-6 col-xs-6 font-weight-bold">
                                <label><input type="checkbox" name="chk[]" class="check2" value="Applied Mechanics">Applied Mechanics</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="checkbox col-lg-6 col-md-6 col-xs-6  font-weight-bold">
                                <label><input type="checkbox" class="check2" value="Applied Chemistry">Applied Chemistry</label>
                                </div>
                                <div class="checkbox col-lg-6 col-md-6 col-xs-6 font-weight-bold">
                                <label><input type="checkbox" name="chk[]" class="check2" value="Computer Science And Engineering">Computer Science And Engineering</label>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="checkbox col-lg-6 col-md-6 col-xs-6 font-weight-bold">
                                <label><input type="checkbox" name="chk[]" class="check2" value="Engineering Mathematics">Engineering mathematics</label>
                                </div>
                             </div>    
             </div>
        
    

  <center>
  <button type="submit" name="submit" id="sub" class="btn btn-primary">Submit</button>
  </center>
  </div>
</form>
</div>
<?php include('check.php');?>

</body>



</html>