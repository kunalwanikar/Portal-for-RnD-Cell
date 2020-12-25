<?php include('table.css');
session_start();
$uid = $_SESSION['uid'];
?>

<h1>Conferences
<br>
<br>

<html>
<head>
<title> Conferences</title>

<body>
  <center><button type="submit" onclick="myFunction()" >Addnew</button></center><br>
<table width="600" border ="1" cellpadding="1" cellspacing="1">
<tr>

<th>Date From</th>
<th>Date To</th>
<th>Title</th>
<th>Broad Area</th>
<th>Brief Desciption</th>
<th>Edit</th>
<th>Delete</th>

</tr>



<?php

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'r&d');

$sql = "SELECT * FROM conferences WHERE UID = '$uid' ";
$records = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($records)){

    echo "<tr>";
    echo "<td>".$row['Date_From']."</td>";
    echo "<td>".$row['Date_to']."</td>";
    echo "<td>".$row['Title']."</td>";
    echo "<td>".$row['Broad_area']."</td>";
    echo "<td>".$row['description']."</td>";
    echo "<td><a href=conferencesedit.php?id=".$row['conferenceID'].">Edit</a></td>";
    echo "<td><a href=delconf.php?id=".$row['conferenceID'].">Delete</a></td>";

}

?>

</table>
<br>
<center>

<iframe id="editframe" src="conf.php"  width="100%" height="1750px" style="visibility: hidden;" scrolling="yes">

</iframe>

</center>
<script>
function myFunction() {
    var x = document.getElementById('editframe');
  if (x.style.visibility === 'hidden') {
    x.style.visibility = 'visible';
  } else {
    x.style.visibility = 'hidden';
  }

}
</script>
</body>
</html>