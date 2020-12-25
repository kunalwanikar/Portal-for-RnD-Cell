<?php
session_start();
$uid=$_SESSION["uid"];
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

$sql = "SELECT * FROM p_info where UID='{$uid}'";
$result = $conn->query($sql);
echo '<input type="button" align="center" name="EDIT" value="Edit" onclick="document.location.href=\'edit_pinfo.php\'"/>';
echo "</br>";echo "</br>";
 while($row = $result->fetch_assoc()) {

            echo "First Name:" ; echo '<input type="text" disabled="true" value='.$row['Name'].'><br/>';
            
            

};  
?>

<!DOCTYPE html>
<html>
<title>Profile</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="prof.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>
<body class="g3-white">

<!-- Page Container -->
<div class="g3-content g3-margin-top" style="max-width:1400px;">
<div class="g3-container g3-card">

 <!-- The Grid -->
 <div class="g3-row-padding">

 <!-- Left Column -->
 <div class="g3-third">
    
    <div class="g3-white g3-text-grey ">
    <hr>
      <div class="g3-display-container">
        <img src="PHOTOS/userimg.png" style="width:30%" alt="Avatar">
        <div class="g3-display-middle g3-text-black">
        <p class="g3-middle"><i class="far fa-id-card g3-margin-right g3-middle g3-text-teal"></i>Name</p>
        <p class="g3-middle"><i class="fas fa-graduation-cap g3-margin-right g3-middle g3-text-teal"></i>Qualification</p>
        <p class="g3-middle"><i class="fas fa-briefcase g3-margin-right g3-middle g3-text-teal"></i>Designation</p>
        <p class="g3-middle"><i class="fas fa-building g3-margin-right g3-middle g3-text-teal"></i>Department</p>
        
        </div>
      </div>
      
      <div class="g3-container">
        
      <p class="g3-text-grey"><i class="fas fa-id-card-alt fa-fw g3-margin-right g3-text-teal"></i>Full Name</p>
      <hr>
      <p class="g3-text-grey"><i class="far fa-calendar-alt g3-margin-right g3-text-teal"></i>Date of Birth</p>
      <hr>
      
      <p class="g3-text-grey"><i class="fas fa-info-circle g3-margin-right g3-text-teal"></i>Employee ID</p>
      <hr>
      
      <p class="g3-text-grey"><i class="fas fa-info-circle g3-margin-right g3-text-teal"></i>Sevaarth ID</p>
      <hr>
      
      <p class="g3-text-grey"><i class="fas fa-briefcase g3-margin-right g3-text-teal"></i>Designation</p>
      <hr>
      
</div>
</div>  

  <!-- End Left Column -->
  </div>
  
  <!-- middle Column -->
  <div class="g3-third">
  <hr>
      <p class="g3-text-grey"><i class="fa fa-suitcase fa-fw g3-margin-right g3-medium g3-text-teal"></i>Highest Qualification<p>
      <hr>
      <p class="g3-text-grey"><i class="fas fa-building g3-margin-right g3-medium g3-text-teal"></i>Department</p>
      <hr>
      <p class="g3-text-grey"><i class="fas fa-credit-card g3-margin-right g3-medium g3-text-teal"></i>PAN</p>
      <hr>
      <p class="g3-text-grey"><i class="fa fa-calendar fa-fw g3-margin-right g3-text-teal"></i>Date of Appointment</p>
      <hr>
      <p class="g3-text-grey"><i class="fas fa-user-tag g3-margin-right g3-medium g3-text-teal"></i>Nature of Appointment</p>
      <hr>
      <p class="g3-text-grey"><i class="fas fa-chalkboard-teacher g3-margin-right g3-medium g3-text-teal"></i>Teaching Experience</p>
      <hr>
      <p class="g3-text-grey"><i class="fas fa-chalkboard-teacher g3-margin-right g3-medium g3-text-teal"></i>Industrial Experience</p>
      <hr>
    
     
  <!-- End middle Column -->
  </div>
      
  <!-- Right Column -->
  <div class="g3-third">
  <hr>

      <p class="g3-text-grey"><i class="fas fa-map-marker-alt g3-margin-right g3-large g3-text-teal"></i>Address:</p>
      <p>Consectetur adipisicing elit. Praesentium magnam consectetur vel in deserunt aspernatur est reprehender</p>
      <hr>
      <p class="g3-text-grey"><i class="fas fa-address-book g3-margin-right g3-large g3-text-teal"></i>Contact details</p>
      <p><i class="fas fa-envelope g3-margin-right g3-large g3-text-teal"></i>Email-ID</p>
      <p><i class="fas fa-phone-square g3-margin-right g3-large g3-text-teal"></i>Tele-Phone</p>
      <p><i class="fas fa-mobile-alt g3-margin-right g3-large g3-text-teal"></i>Mobile</p>
      <hr>
      
      <form class=" button g3-right-align g3-padding-64">
       <button type="button" onclick="myFunction()">Print this page</button>
      </form>
     
     
  <!-- End Right Column -->
  </div>
  
  </div>
  </div>      
</div> 
<script>
function myFunction() {
  window.print();
}
</script>

</body>
</html>   