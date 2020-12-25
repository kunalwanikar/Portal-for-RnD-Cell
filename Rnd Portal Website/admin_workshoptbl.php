
<?php
include('table.css');
session_start(); 
?>

<html>
<head>
<title> Administrative work</title>

</head>
<body>
<h1>Administrative Works  
<br>
<br>
<center><button type="submit" onclick="myFunction993()" >Addnew</button></center><br><br>

<table width="600" border ="1" cellpadding="1" cellspacing="1">
<tr>
  
<th>Role</th>
<th>Date From</th>
<th>Date To</th>
<th>Work description</th>
<th>Edit</th>
<th>Delete</th>
</tr>



<?php

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'r&d');
$sql = "SELECT * FROM administrative_work WHERE UID='".$_SESSION['uid']."' ";
$records = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($records)){

    echo "<tr>";
    echo "<td>".$row['Serial_no']."</td>";
    echo "<td>".$row['Work_Description']."</td>";
    echo "<td><a href=delete.php?id=".$row['awID'].">Edit</a></td>";
    echo "<td><a href=delexpindustry.php?id=".$row['awID'].">Delete</a></td>";
    echo "</tr>";
}
?>
</table>
<br>
<center>

<iframe id="aw_frame" src="admin_workxp.php" width="100%" height="680px" style="visibility: hidden;" scrolling="yes">

</iframe>

</center>

<script>
function myFunction993() {
    var x = document.getElementById('aw_frame');
  if (x.style.visibility === 'hidden') {
    x.style.visibility = 'visible';
  } else {
    x.style.visibility = 'hidden';
  }

}
</script>

</body>
</html>