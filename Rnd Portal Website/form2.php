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
include('check.php');
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
<form class="form-control z-depth-4" method="post" action="form4.php">
 
<div class="offset-2" style="padding-top: 30px;">
<?php
if(isset($_POST['submit'])){
if(!empty($_POST['chk'])) {
// Counting number of checked checkboxes.
$checked_count = count($_POST['chk']);
//echo "You have selected following ".$checked_count." option(s): <br/>";
// Loop to store and display values of individual checked checkbox.
$arr = array();
foreach($_POST['chk'] as $selected) {
    array_push($arr, $selected);
}
/*echo "<pre>";
print_r($arr);
echo "</pre>";*/
$ids = join("', '", $arr);
$sql = "SELECT * FROM p_info where Department IN ('$ids') ORDER BY Department ";
//$query = $this->db->query($sql, array($arr)) ; 
$result = mysqli_query($conn, $sql);
?>
<div class="form-group offset-1 " id= "chk">
    <div class="checkbox font-weight-bold">
                <input type="button" onclick="checkAll3()" class="btn btn-link font-weight-bold" value="Select All">
                <input type="button" onclick="uncheckAll3()" class="btn btn-link font-weight-bold" value="Select None">
    </div>


 <?php while($row = mysqli_fetch_assoc($result)) { 
  
     ?>
     <div class="checkbox col-lg-6 col-md-6 col-xs-6 font-weight-bold">
    <input type="checkbox" name="chk2[]" class="check3" value="<?php echo $row["UID"];?>"> <label> <?php echo $row["Firstname"]. $row["Middlename"]. $row["Lastname"] ;?></label> <br/>
     </div>
<?php 
} 

}
}
?>

</div>
 <center>
  <button type="submit" name="submit" id="sub" class="btn btn-primary">Submit</button>
  </center>
</div>
</form>
</div>


   


</html>