<?php 
session_start();
$conn = mysqli_connect("localhost","root","","r&d");
if(isset($_POST['submit'])){
$username = $_POST['username'];//from form
$password = $_POST['password'];//from form
$role = $_POST['user_type'];//from form

$query = "SELECT * FROM new_registration WHERE username='{$username}' AND password='{$password}' AND role='{$role}' ";
$result = mysqli_query($conn,$query);

$sql = "SELECT * FROM new_registration where username = '$username' ";                                 
$final = $conn->query($sql);
while($rowval = $final->fetch_assoc()) {
$status= $rowval['Status'];
};

if($status == "Active"){
if($res=mysqli_fetch_array($result)){
$_SESSION['user'] = $username;

if(isset($_POST['user_type']) && ($_POST['user_type']) == "principal")
{
    header("Location: principal_index.php"); 
}

else if(isset($_POST['user_type']) && ($_POST['user_type']) == "dean")
{
    header("Location: principal_index.php"); 
}

else if(isset($_POST['user_type']) && ($_POST['user_type']) == "coordinator")
{
    header("Location: principal_index.php"); 
}

else if(isset($_POST['user_type']) && ($_POST['user_type']) == "hod")
{
    header("Location: hod_index.php"); 
}

else{
        header("Location: nonprincipal_index.php");
}

//header("Location: nonprincipal_index.php");
/*$uid = $_SESSION['UID'];*/
}

else{
 echo "<script>alert(\"Login Failed! Make sure to enter correct details\");</script>";
}
}

else{
  echo "<script>alert(\"Your account is temporarily INACTIVE, Please contact the Administrator to activate your account\");</script>";
}

}

error_reporting(0);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Portal | Research and development cell | Government College of Engineering, Amravati </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
<!--===============================================================================================-->


<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<!--CSS code-->
<style type="text/css">
/*//////////////////////////////////////////////////////////////////
[ FONT ]*/

@font-face {
  font-family: Poppins-Regular;
  src: url('../fonts/poppins/Poppins-Regular.ttf'); 
}

@font-face {
  font-family: Poppins-Bold;
  src: url('../fonts/poppins/Poppins-Bold.ttf'); 
}

@font-face {
  font-family: Poppins-Medium;
  src: url('../fonts/poppins/Poppins-Medium.ttf'); 
}

@font-face {
  font-family: Montserrat-Bold;
  src: url('../fonts/montserrat/Montserrat-Bold.ttf'); 
}

/*//////////////////////////////////////////////////////////////////
[ RESTYLE TAG ]*/

* {
  margin: 0px; 
  padding: 0px; 
  box-sizing: border-box;
}

body, html {
  height: 100%;
  font-family: Poppins-Regular, sans-serif;
}

/*---------------------------------------------*/
a {
  font-family: Poppins-Regular;
  font-size: 14px;
  line-height: 1.7;
  color: #666666;
  margin: 0px;
  transition: all 0.4s;
  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
}

a:focus {
  outline: none !important;
}

a:hover {
  text-decoration: none;
  color: #57b846;
}

/*---------------------------------------------*/
h1,h2,h3,h4,h5,h6 {
  margin: 0px;
}

p {
  font-family: Poppins-Regular;
  font-size: 14px;
  line-height: 1.7;
  color: #666666;
  margin: 0px;
}

ul, li {
  margin: 0px;
  list-style-type: none;
}


/*---------------------------------------------*/
input {
  outline: none;
  border: none;
}

textarea {
  outline: none;
  border: none;
}

textarea:focus, input:focus {
  border-color: transparent !important;
}

input:focus::-webkit-input-placeholder { color:transparent; }
input:focus:-moz-placeholder { color:transparent; }
input:focus::-moz-placeholder { color:transparent; }
input:focus:-ms-input-placeholder { color:transparent; }

textarea:focus::-webkit-input-placeholder { color:transparent; }
textarea:focus:-moz-placeholder { color:transparent; }
textarea:focus::-moz-placeholder { color:transparent; }
textarea:focus:-ms-input-placeholder { color:transparent; }

input::-webkit-input-placeholder { color: #999999; }
input:-moz-placeholder { color: #999999; }
input::-moz-placeholder { color: #999999; }
input:-ms-input-placeholder { color: #999999; }

textarea::-webkit-input-placeholder { color: #999999; }
textarea:-moz-placeholder { color: #999999; }
textarea::-moz-placeholder { color: #999999; }
textarea:-ms-input-placeholder { color: #999999; }

/*---------------------------------------------*/
button {
  outline: none !important;
  border: none;
  background: transparent;
}

button:hover {
  cursor: pointer;
}

iframe {
  border: none !important;
}


/*//////////////////////////////////////////////////////////////////
[ Utility ]*/
.txt1 {
  font-family: Poppins-Regular;
  font-size: 13px;
  line-height: 1.5;
  color: #999999;
}

.txt2 {
  font-family: Poppins-Regular;
  font-size: 13px;
  line-height: 1.5;
  color: #666666;
}


/*//////////////////////////////////////////////////////////////////
[ login ]*/

.limiter {
  width: 100%;
  margin: 0 auto;
}

.container-login100 {
  width: 100%;  
  min-height: 100vh;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  padding: 15px;
  background: #9053c7;
  background: -webkit-linear-gradient(-135deg, #c850c0, #4158d0);
  background: -o-linear-gradient(-135deg, #c850c0, #4158d0);
  background: -moz-linear-gradient(-135deg, #c850c0, #4158d0);
  background: linear-gradient(-135deg, #c850c0, #4158d0);
}

.wrap-login100 {
  width: 960px;
  background: #fff;
  border-radius: 10px;
  overflow: hidden;

  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  padding: 150px 130px 150px 95px;
}

/*------------------------------------------------------------------
[  ]*/
.login100-pic {
  width: 316px;
}

.login100-pic img {
  max-width: 100%;
}


/*------------------------------------------------------------------
[  ]*/
.login100-form {
  width: 290px;
}

.login100-form-title {
  font-family: Poppins-Bold;
  font-size: 24px;
  color: #333333;
  line-height: 1.2;
  text-align: center;

  width: 100%;
  display: block;
  padding-bottom: 54px;
}


/*---------------------------------------------*/
.wrap-input100 {
  position: relative;
  width: 100%;
  z-index: 1;
  margin-bottom: 10px;
}

.input100 {
  font-family: Poppins-Medium;
  font-size: 15px;
  line-height: 1.5;
  color: #666666;

  display: block;
  width: 100%;
  background: #e6e6e6;
  height: 50px;
  border-radius: 25px;
  padding: 0 30px 0 68px;
}


/*------------------------------------------------------------------
[ Focus ]*/
.focus-input100 {
  display: block;
  position: absolute;
  border-radius: 25px;
  bottom: 0;
  left: 0;
  z-index: -1;
  width: 100%;
  height: 100%;
  box-shadow: 0px 0px 0px 0px;
  color: rgba(87,184,70, 0.8);
}

.input100:focus + .focus-input100 {
  -webkit-animation: anim-shadow 0.5s ease-in-out forwards;
  animation: anim-shadow 0.5s ease-in-out forwards;
}

@-webkit-keyframes anim-shadow {
  to {
    box-shadow: 0px 0px 70px 25px;
    opacity: 0;
  }
}

@keyframes anim-shadow {
  to {
    box-shadow: 0px 0px 70px 25px;
    opacity: 0;
  }
}

.symbol-input100 {
  font-size: 15px;

  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  align-items: center;
  position: absolute;
  border-radius: 25px;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  padding-left: 35px;
  pointer-events: none;
  color: #666666;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.input100:focus + .focus-input100 + .symbol-input100 {
  color: #57b846;
  padding-left: 28px;
}

/*------------------------------------------------------------------
[ Button ]*/
.container-login100-form-btn {
  width: 100%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  padding-top: 20px;
}

.login100-form-btn {
  font-family: Montserrat-Bold;
  font-size: 15px;
  line-height: 1.5;
  color: #fff;
  text-transform: uppercase;

  width: 100%;
  height: 50px;
  border-radius: 25px;
  background: #57b846;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0 25px;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.login100-form-btn:hover {
  background: #333333;
}



/*------------------------------------------------------------------
[ Responsive ]*/



@media (max-width: 992px) {
  .wrap-login100 {
    padding: 177px 90px 33px 85px;
  }

  .login100-pic {
    width: 35%;
  }

  .login100-form {
    width: 50%;
  }
}

@media (max-width: 768px) {
  .wrap-login100 {
    padding: 100px 80px 33px 80px;
  }

  .login100-pic {
    display: none;
  }

  .login100-form {
    width: 100%;
  }
}

@media (max-width: 576px) {
  .wrap-login100 {
    padding: 100px 15px 33px 15px;
  }
}


/*------------------------------------------------------------------
[ Alert validate ]*/

.validate-input {
  position: relative;
}

.alert-validate::before {
  content: attr(data-validate);
  position: absolute;
  max-width: 70%;
  background-color: white;
  border: 1px solid #c80000;
  border-radius: 13px;
  padding: 4px 25px 4px 10px;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
  right: 8px;
  pointer-events: none;

  font-family: Poppins-Medium;
  color: #c80000;
  font-size: 13px;
  line-height: 1.4;
  text-align: left;

  visibility: hidden;
  opacity: 0;

  -webkit-transition: opacity 0.4s;
  -o-transition: opacity 0.4s;
  -moz-transition: opacity 0.4s;
  transition: opacity 0.4s;
}

.alert-validate::after {
  content: "\f06a";
  font-family: FontAwesome;
  display: block;
  position: absolute;
  color: #c80000;
  font-size: 15px;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
  right: 13px;
}

.alert-validate:hover:before {
  visibility: visible;
  opacity: 1;
}

@media (max-width: 992px) {
  .alert-validate::before {
    visibility: visible;
    opacity: 1;
  }
}
</style>
<!--CSS code-->

</head>
<body>
   <!--header-->
<div style="background-color: #fff;">
  <center>
<img src="PHOTOS\header_final.jpg" >
</center>
</div>
<!--header-->
  
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="images/13597_GCOE.png" alt="IMG">
        </div>

        <form class="login100-form validate-form" method="post">
          <span class="login100-form-title" style="font-weight: bold;">
            Research and Development Cell Login Portal
          </span>


          <div class="wrap-input100">
      <span style="font-size: medium;font-weight: bold; ">Role</span><br>
      <div class="row">
    <label class="radio-inline">
      <input type="radio" name="user_type" value="principal" style="font-size: smaller;">Principal
    </label>
    <label class="radio-inline">
      <input type="radio" name="user_type" value="dean" style="font-size: smaller;">Dean
    </label>
    <label class="radio-inline">
      <input type="radio" name="user_type" value="hod" style="font-size: smaller;">HOD
    </label>
        <label class="radio-inline">
      <input type="radio" name="user_type" value="faculty" style="font-size: smaller;">Faculty
    </label> 
  </div>
  <div class="row"> 
    <label class="radio-inline">
      <input type="radio" name="user_type" value="coordinator" style="font-size: smaller;">Coordinator
    </label>  
    </div>
          </div>

          <div class="wrap-input100">
            <input class="input100" type="text" name="username" placeholder="Username" autocomplete="off">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <span class="glyphicon glyphicon-user"></span>
            </span>
          </div>

          <div class="wrap-input100">
            <input class="input100" type="password" name="password" placeholder="Password" autocomplete="off">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <span class="glyphicon glyphicon-lock"></span>
            </span>
          </div>
          
          <div class="container-login100-form-btn">
            <center><input type="submit" name="submit" value="Log In" class="login100-form-btn" autocomplete="off"></center>
          </div>

         <!-- <div class="text-center p-t-12">
            <a class="txt2" href="#">
              Forgot Password?
            </a>
          </div>
-->
          <div class="text-center p-t-136">
            <a class="txt2" href="https://www.gcoeaa.ac.in">
              HOME
              <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  
<!--===============================================================================================-->  
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/tilt/tilt.jquery.min.js"></script>
  <script >
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>

  <!-- Footer -->
<footer class="page-footer font-small special-color-dark pt-4" style="background-color: #1C2833;">

    <!-- Footer Links -->
    <div class="container text-center text-md-left">

      <!-- Social buttons -->
      <ul class="list-unstyled list-inline text-center">
        <li class="list-inline-item">
          <a href="https://www.gmail.com"><img src="https://gcoea.ac.in/wp-content/themes/Amrawati/images/google+.png" alt="" /></a>
            
          </a>
        </li>
        <li class="list-inline-item">
          <a href="https://www.twitter.com"><img src="https://gcoea.ac.in/wp-content/themes/Amrawati/images/twitter.png" alt="" /></a>
           
          </a>
        </li>
        <li class="list-inline-item">
          <a href="https://www.facebook.com"><img src="https://gcoea.ac.in/wp-content/themes/Amrawati/images/facebook.png" alt="" /></a>
            
          </a>
        </li>
        <li class="list-inline-item">
          <a href="https://www.youtube.com"><img src="https://gcoea.ac.in/wp-content/themes/Amrawati/images/youtube.png" alt="" /></a>
            
          </a>
        </li>
      </ul>
      <!-- Social buttons -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3 text-success"> © 2019 Copyright:
      <a href="https://www.gcoea.ac.in"> Government College of Engineering, Amravati | Developed by GCOEA </a>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->


</body>
</html>