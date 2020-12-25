<h1>Recognized as PhD
<br>
<br>

<html>
<head>
<title> PhD Recognition</title>
</head>
<body>
<center><button type="submit" onclick="myFunction()" >Addnew</button></center> <br><br>
<table width="1000" border ="1" cellpadding="1" cellspacing="1">
<tr>

<th>Whether Recognized</th>
<th>University</th>
<th>College Name</th>
<th>Year</th>
<th>No. of Students completed PhD</th>
<th>No. of Students pursuing PhD</th>
<th>Edit</th>
<th>Delete</th>

</tr>

<?php
include('table.css');
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'r&d');
$sql = "SELECT * FROM recg_as_phd WHERE UID = '".$_SESSION['uid']."' ";
$records = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($records)){

    echo "<tr>";
    echo "<td>".$row['Recognized']."</td>";
    echo "<td>".$row['University']."</td>";
    echo "<td>".$row['College_name']."</td>";
    echo "<td>".$row['Year']."</td>";
    echo "<td>".$row['stud_completed']."</td>";
    echo "<td>".$row['stud_pursuing']."</td>";
    echo "<td><a href=recg_as_phdedit.php?id=".$row['recgID'].">Edit</a></td>";
    echo "<td><a href=delrecgasphd.php?id=".$row['recgID'].">Delete</a></td>";

}

?>



</table>
<br>
<center>
<iframe id="frame1" src="recg_as_phd.php" width="100%" height="680px" style="visibility: hidden;" scrolling="yes">

</iframe>

</center>
<script>
function myFunction() {
    var x = document.getElementById('frame1');
  if (x.style.visibility === 'hidden') {
    x.style.visibility = 'visible';
  } else {
    x.style.visibility = 'hidden';
  }

}
</script>
</body>
</html>