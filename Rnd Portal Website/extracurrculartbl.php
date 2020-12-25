
<?php
include('table.css');
?>

<html>
<head>
<title> Qualification details</title>

</head>
<body>
<h1>Extra Curricular Activities
<br>
<br>
<center><button type="submit" onclick="myFunction()" >Addnew</button></center><br><br>

<table width="600" border ="1" cellpadding="1" cellspacing="1">
<tr>

<th>Venue</th>
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
$sql = "SELECT * FROM extracurricular_activity WHERE UID='".$_SESSION['uid']."' ";
$records = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($records)){

    echo "<tr>";
    echo "<td>".$row['Serial_no']."</td>";
    echo "<td>".$row['Work_Description']."</td>";
    echo "<td><a href=delete.php?id=".$row['ecaID'].">Edit</a></td>";
    echo "<td><a href=delexpindustry.php?id=".$row['ecaID'].">Delete</a></td>";
    echo "</tr>";

}
?>
</table>
<br>
<center>

<iframe id="eca_frame" src="extracurricular.php" width="100%" height="680px" style="visibility: hidden;" scrolling="yes">

</iframe>

</center>

<script>
function myFunction() {
    var x = document.getElementById('eca_frame');
  if (x.style.visibility === 'hidden') {
    x.style.visibility = 'visible';
  } else {
    x.style.visibility = 'hidden';
  }

}
</script>

</body>
</html>