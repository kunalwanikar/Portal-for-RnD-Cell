<?php 
session_start();
include('table.css'); 

?>
<h1>PhD Details

<html>
<head>
<title> PhD Details</title>

</head>
<body>
    <br><br><center><button type="submit" onclick="myFunction996()" >Addnew</button></center><br><br>
<table width="1200" border ="1" cellpadding="1" cellspacing="1">
<tr>

<th>Name of Topic</th>
<th>Name of Guide</th>
<th>College Name</th>
<th>University</th>
<th>Status</th>
<th>Registration number</th>
<th>Letter/Degree</th>
<th>Year of Obtaining</th>
<th>Edit</th>
<th>Delete</th>
</tr>



<?php

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'r&d');
$sql = "SELECT * FROM phd_details WHERE UID = '".$_SESSION['uid']."' ";
$records = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($records)){

    echo "<tr>";
    echo "<td>".$row['Name_of_topic']."</td>";
    echo "<td>".$row['Name_of_guide']."</td>";
    echo "<td>".$row['College_name']."</td>";
    echo "<td>".$row['University']."</td>";
    echo "<td>".$row['status']."</td>";
    echo "<td>".$row['Registration_no']."</td>";
    echo "<td>".$row['Upload_letterORdegree']."</td>";
    echo "<td>".$row['year_of_obtaining']."</td>";
    echo "<td><a href=phd_detailsedit.php?id=".$row['phdID'].">Edit</a></td>";
    echo "<td><a href=delphddetails.php?id=".$row['phdID'].">Delete</a></td>";

}
    
    ?>
   
</table>
<br>
<center>

<iframe id="frame" src="phd_details.php" id="frame" width="100%" height="680px" style="visibility: hidden;" scrolling="yes">

</iframe>
</center>
<script>
function myFunction996() {
    var x = document.getElementById('frame');
  if (x.style.visibility === 'hidden') {
    x.style.visibility = 'visible';
  } else {
    x.style.visibility = 'hidden';
  }

}
</script>
</body>
</html>