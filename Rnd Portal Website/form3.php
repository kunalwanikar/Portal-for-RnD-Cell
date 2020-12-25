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
   // echo"bye";
}

}
?>