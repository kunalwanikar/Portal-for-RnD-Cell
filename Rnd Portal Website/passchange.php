<?php
session_start();
$dbcon = mysqli_connect('localhost', 'root', '', 'r&d') or die(mysqli_error($dbcon));

if(isset($_POST['Save'])){ 
$password1 = mysqli_real_escape_string($dbcon, $_POST['newpassword']);
$password2 = mysqli_real_escape_string($dbcon, $_POST['cnfrmpassword']);
$username = $_POST['username'];

if ($password1 <> $password2)
{
    echo '<span style="color:#ff0505;text-align:center;font-weight-bold"> Your passwords do not match </span>';
}
else
{
    mysqli_query($dbcon, "UPDATE new_registration SET password='$password1' WHERE username='$username'");
    echo '<span style="color:#039e17;text-align:center;font-weight-bold"> You have successfully changed your password </span>';
}
}
    mysqli_close($dbcon);

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

<h2 class="font-weight-bold text-center text-dark" style="text-shadow: 2px 2px 5px lightblue;padding-top: 10px;">Password Change</h2><br>
    <div class="form-group col-lg-4 col-md-4 col-xs-4" >
    <label class="font-weight-bold" >Username : </label>
    <input type="text" name="username" class="form-control"  id="usrname" placeholder="Username" autocomplete="off">
    <span id="usr_name" class="text-danger"> </span>
    </div>
    
    <div class="form-group col-lg-4 col-md-4 col-xs-4" >
    <label class="font-weight-bold" >New Password : </label>
    <input type="password" name="newpassword" class="form-control"  id="newpass" placeholder="new Password" autocomplete="off">
    <span id="new_pass" class="text-danger"> </span>
    </div>

     <div class="form-group col-lg-4 col-md-4 col-xs-4" >
    <label class="font-weight-bold" >Confirm Password : </label>
    <input type="password" name="cnfrmpassword" class="form-control"  id="cnfrmpass" placeholder="Confirm Password" autocomplete="off">
    <span id="cnfrm_pass" class="text-danger"> </span>
    </div>

    <center><input type="submit" class="btn bg-success" name="Save" id="sbmit" value="Save">

</form>

</div>

<script type="text/javascript">
        
        function validation(){

            var usrname = document.getElementById('usrname').value;
            var newpass = document.getElementById('newpass').value;
            var cnfrmpass = document.getElementById('cnfrmpass').value;

            if(usrname == ""){
                document.getElementById('usr_name').innerHTML =" **Please fill the Username";
                return false;
            }

            if(newpass == ""){
                document.getElementById('new_pass').innerHTML =" **Please fill the New Password";
                return false;
            }

            if(cnfrmpass == ""){
                document.getElementById('cnfrm_pass').innerHTML =" **Please fill the New Password again ";
                return false;
            }
}       

</script>
</body>
</html>