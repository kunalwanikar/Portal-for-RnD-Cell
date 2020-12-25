<?php
if(isset($_POST['submit']))
{
 $host="localhost";
 $username="root";
 $password="";
 $databasename="r&d";
 $connect=mysqli_connect($host,$username,$password, $databasename);
 
 $name = $_POST['toogle_name'];
 $status = $_POST['status'];

 					mysqli_query($connect, "UPDATE `new_registration` SET `Status`='$status' WHERE username = '$name' ");				
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Activate/Deactivate user account</title>
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
	<div class="container"style="padding-top: 20px; padding-bottom: 30px;"><br>
		
		<div class="col-lg-9 m-auto d-block">
			
			
			<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" class="form-control z-depth-4" onsubmit="return validation()">
				<div style="padding-top: 20px;"></div>
				<center><h4 class="font-weight-bold"> Activate/Deactivate user account</h4></center>

				<div class="form-group col-lg-8 col-md-8 col-xs-8">
					<label for="Appointed as" class="font-weight-bold">Username to deactive the account : </label>
					<input type="text" name="toogle_name" class="form-control" id="name" autocomplete="off">
					<span id="name_span" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-8 col-md-8 col-xs-8">
                    <label class="font-weight-bold" title="Active status allows the user to use and make changes to the account"> Status of account: </label><br>
                    <span style="font-size: smaller;color: blue;">Select Deactive to deactivate the user account temporarily</span>
                    <div class="radio" >
                    <label class="radio-inline"><input type="radio" name="status" id="stts" value="Active" > Active </label> 
                    </div>
                    <div class="radio">
                    <label class="radio-inline"><input type="radio" name="status" id="stts" value="Deactive" > Deactive </label> 
                    </div>
                </div>
        <center><input type="submit" name="submit" value="Save" class="btn btn-success"></center>
    </form>
</div>
</div>
</body>
</html>
            