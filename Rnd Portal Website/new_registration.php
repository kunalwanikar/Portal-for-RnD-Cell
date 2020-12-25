<?php
if(isset($_POST['register']))
{
 $host="localhost";
 $username="root";
 $password="";
 $databasename="r&d";
 $connect=mysqli_connect($host,$username,$password, $databasename);
 
 
 $fname = $_POST['fname'];
 $mname = $_POST['mname'];
 $lname = $_POST['lname'];
 $department = $_POST['department'];
 $designation = $_POST['designation'];
 $gender = $_POST['Gender'];
 $status = $_POST['status'];
 $role = "faculty";
 $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
 $password = substr( str_shuffle( $chars ), 0, 8 );
 $nums = "0123456789";
 $uid = substr( str_shuffle( $nums ), 0, 5 );
 $loginname = $fname.''.$uid;

			$query1 = mysqli_query($connect, "SELECT * FROM new_registration WHERE UID='$uid'");

			if(mysqli_num_rows($query1) > 0 ) { //check if there is already an entry for that username
				echo"<br>";
				echo "<font color=red size=4 >";
				echo"<center><b>";
				echo "Sorry fo the inconvenience, Please try again!";
				echo"</b></center>";
			}
			else{
 					mysqli_query($connect, "INSERT INTO `new_registration`(`firstname`, `middlename`, `lastname`, `department`, `username`, `password`, `UID`, `role`, `designation`, `Gender`, `Status`) VALUES('$fname', '$mname', '$lname', '$department', '$loginname', '$password', '$uid', '$role', '$designation', '$gender', '$status')");

 					mysqli_query($connect, "INSERT INTO p_info(Firstname, Middlename, Lastname, Department, Designation, Mobile, Office, Email_id, Qualification, Gender, Day_of_Birth, Month_of_Birth, Year_of_Birth, Address, Date_of_joining, Upload_photo, UID) VALUES ('$fname','$mname','$lname','$department','$designation','','','','','','','','','','','','$uid')");
				}

echo "<script>alert(\" Username: $loginname Password: $password \");</script>";


}
?>

<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.6.1/css/mdb.min.css" rel="stylesheet">

<!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</style>
</head>
<body>

<div class="col-lg-12 m-auto d-block">
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" class="form-control" onsubmit="return validation()" style="border: none;">

<h2 class="font-weight-bold text-center text-dark" style="text-shadow: 2px 2px 5px lightblue;padding-top: 10px;">New Faculty Registration</h2><br>
<div class="row">
    <div class="form-group col-lg-4 col-md-4 col-xs-4" >
    <label class="font-weight-bold" >First Name : </label>
    <input type="text" name="fname" class="form-control"  id="name_f" placeholder="First Name" autocomplete="off">
    <span id="F_name" class="text-danger"> </span>
    </div>
    
    <div class="form-group col-lg-4 col-md-4 col-xs-4" >
    <label class="font-weight-bold" >Middle Name : </label>
    <input type="text" name="mname" class="form-control"  id="name_m" placeholder="Middle Name" autocomplete="off">
    <span id="M_name" class="text-danger"> </span>
    </div>


    <div class="form-group col-lg-4 col-md-4 col-xs-4" >
     <label class="font-weight-bold" >Last Name : </label>
     <input type="text" name="lname" class="form-control"  id="name_l" placeholder="Last Name" autocomplete="off" >
     <span id="L_name" class="text-danger"> </span>
    </div>

</div>

<div class="row">
    <div class="form-group col-lg-4 col-md-4 col-xs-4">
                    <label class="font-weight-bold"> Gender: </label>
                    <div class="radio" >
                    <label class="radio-inline"><input type="radio" name="Gender" id="gndr1" value="Male" >Male </label> 
                    <label class="radio-inline"><input type="radio" name="Gender" id="gndr2" value="Female" >Female </label>
                    <label class="radio-inline"><input type="radio" name="Gender" id="gndr3" value="Other" >Other </label>
                     </div>
                </div>
<div class="form-group col-lg-4 col-md-4 col-xs-4">
                    <label class="font-weight-bold">Department :</label>
                    <select class="form-control" id="select_1" name="department">
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
    				<option value="Engineering Mathematics">Engineering Mathematics</option>
  					</select>
                    <span id="dept" class="text-danger"> </span>
</div>

<div class="form-group col-lg-4 col-md-4 col-xs-4" >
<label class="font-weight-bold">Designation :</label>
                    <select class="form-control" id="select_2" name="designation">
                    <option value="Lecturer">Lecturer</option>
                    <option value="Assistant Professor">Assistant Professor</option>
                    <option value="Associate Professor">Associate Professor</option>
                    <option value="Professor">Professor</option>
                    </select>
                    <span id="desc" class="text-danger"> </span>
</div>
</div>

<div class="row">
 <div class="form-group col-lg-4 col-md-4 col-xs-4">
                    <label class="font-weight-bold" title="Active status allows the user to use and make changes to the account"> Status of account: </label><br>
                    <span style="font-size: smaller;color: blue;">Enter Active if User is presest in the institute.</span>
                    <div class="radio" >
                    <label class="radio-inline"><input type="radio" name="status" id="stts" value="Active" > Active </label> 
                    </div>
                    <div class="radio">
                    <label class="radio-inline"><input type="radio" name="status" id="stts" value="Deactive" > Deactive </label> 
                    </div>
                     </div>
                </div>

                 <input type="hidden" name="role" id="Role" value="faculty" autocomplete="off">
</div>
<center>
<input type="submit" name="register" value="REGISTER" class="btn btn-success" >
</center>
</form>
</div>
<script type="text/javascript">
        function validation(){

            var f_name = document.getElementById('name_f').value;
            var m_name = document.getElementById('name_m').value;
            var l_name = document.getElementById('name_l').value;



            if(f_name == ""){
                document.getElementById('F_name').innerHTML =" Please fill the First name field";
                return false;
            }
            if((f_name.length <1) || (f_name.length > 30)) {
                document.getElementById('F_name').innerHTML =" Lenght must be between 1 and 30";
                return false;   
            }
            if(!isNaN(f_name)){ 
                document.getElementById('F_name').innerHTML =" Only characters are allowed";
                return false;
            }


            if(m_name == ""){
                document.getElementById('M_name').innerHTML =" Please fill the Middle name field";
                return false;
            }
            if((m_name.length < 1) || (m_name.length > 30)) {
                document.getElementById('M_name').innerHTML =" Lenght must be between 1 and 30";
                return false;   
            }
            if(!isNaN(m_name)){
                document.getElementById('M_name').innerHTML =" Only characters are allowed";
                return false;
            }


            if(l_name == ""){
                document.getElementById('L_name').innerHTML =" Please fill the Last name field";
                return false;
            }
            if((l_name.length < 1) || (l_name.length > 30)) {
                document.getElementById('L_name').innerHTML =" Lenght must be between 1 and 30";
                return false;   
            }
            if(!isNaN(l_name)){
                document.getElementById('L_name').innerHTML =" Only characters are allowed";
                return false;
            }

    }
</script>
</body>
</html>