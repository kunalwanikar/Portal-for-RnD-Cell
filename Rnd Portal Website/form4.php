
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


if(isset($_POST['submit'])){
    
if(!empty($_POST['chk2'])) {
    //echo "hi";
// Counting number of checked checkboxes.
$checked_count = count($_POST['chk2']);
//echo "You have selected following ".$checked_count." option(s): <br/>";
// Loop to store and display values of individual checked checkbox.
$arry = array();
foreach($_POST['chk2'] as $selected) {
    array_push($arry, $selected);
}
/*echo "<pre>";
print_r($arry);
echo "</pre>";*/

}
else{
    //echo"bye";
}

}
 
$teach= json_encode($arry, true);
setcookie('teachers',$teach);

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
<form class="form-control z-depth-4" method="post" action=" form5.php">
 
<div style="padding-top: 30px;">
  
<label   class="font-weight-bold offset-1"> Select Date Range</label>
  <div class="row offset-1 ">
	<div class="form-group col-lg-6 col-md-6 col-xs-6">
    <label for="myDate"  class="font-weight-bold offset-1"> From</label>
        <input type="date" name="mydate" onload="getDate()">

        
    </div>
    
	<div class="form-group col-lg-6 col-md-6 col-xs-6">
    <label for="myDate"  class="font-weight-bold offset-1"> To</label>
        <input type="date" name="myDate1" onload="getDate()">
    </div>
    
    </div>

<!---- Radio Button Starts Here ----->
<label class="font-weight-bold offset-1">Radio Buttons :</label>
<div class="offset-2">
<input name="radio" type="radio" value="books">Books <br>
<input name="radio" type="radio" value="patents">Patents <br>
<input name="radio" type="radio" value="papers">Journals <br>
<input name="radio" type="radio" value="conferences">Conferences <br>
<input name="radio" type="radio" value="workshops">Workshops <br>
<input name="radio" type="radio" value="innovations">Innovations <br>
<input name="radio" type="radio" value="externally_funded_projects">Projects <br>
<input name="radio" type="radio" value="trainings">Trainings <br>
</div>




<center>
<input name="submit" type="submit" value="Decide Column Numbers and Values">
</center>



</div>
</div>
</form>
</body>



</html> 