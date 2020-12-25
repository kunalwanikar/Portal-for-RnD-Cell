<?php include('table.css');
session_start();
$uid = $_SESSION['uid'];
?>
<h1>Workshops
<br>
<br>

<html>
<head>
<title> Workshops</title>

</head>
<body>
<center><button type="submit" onclick="myFunction995()" >Addnew</button></center><br><br>
<table width="1000" border ="1" cellpadding="1" cellspacing="1">
<tr>
<th>Department</th>
<th>Title</th>
<th>Date From</th>
<th>Date To</th>
<th>Broad Area</th>
<th>No. of Participants</th>
<th>Amount</th>
<th>Held under TEQIP?</th>
<th>Description</th>
<th>Edit</th>
<th>Delete</th>
</tr>



<?php

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'r&d');
$sql = "SELECT * FROM workshops WHERE UID = '$uid' ";
$records = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($records)){

    echo "<tr>";
    echo "<td>".$row['Department']."</td>";
    echo "<td>".$row['Title']."</td>";
    echo "<td>".$row['Date_from']."</td>";
    echo "<td>".$row['Date_to']."</td>";
    echo "<td>".$row['Broad_area']."</td>";
    echo "<td>".$row['No_of_participants']."</td>";
    echo "<td>".$row['Amount']."</td>";
    echo "<td>".$row['Under_TEQIP_or_Not']."</td>";
    echo "<td>".$row['Description']."</td>";
    echo "<td><a href=workshopedit.php?id=".$row['workshopID'].">Edit</a></td>";
    echo "<td><a href=delworkshops.php?id=".$row['workshopID'].">Delete</a></td>";

}
    ?>
    
   
</table>
<br>
<center>

<iframe id="workshp_frame" src="workshop.php" width="100%" height="800px" style="visibility: hidden;" scrolling="yes">

</iframe>
</center>
<script>
function myFunction995() {
    var x = document.getElementById('workshp_frame');
  if (x.style.visibility === 'hidden') {
    x.style.visibility = 'visible';
  } else {
    x.style.visibility = 'hidden';
  }

}
</script>
</body>
</html>