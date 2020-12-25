<?php
session_start();
$uid=$_SESSION['uid'];
?>
<h1>Training
<br>
<br>
<html>
<head>
<title>Trainings</title>
<body>
    <center><button type="submit" onclick="myFunction994()">Addnew</button></center><br><br>
<table width="1000" border ="1" cellpadding="1" cellspacing="1">

<tr>

<th>Time Duration</th>
<th>Subject</th>
<th>Place of training</th>
<th>No. of participants</th>
<th>Workshop Description</th>
<th>Training Description</th>
<th>Edit</th>
<th>Delete</th>

</tr>

<?php

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'r&d');
$sql = "SELECT * FROM training WHERE UID='$uid' ";
$records = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($records)){

    echo "<tr>";
    echo "<td>".$row['Type']."</td>";
    echo "<td>".$row['Time_Duration']."</td>";
    echo "<td>".$row['Subject']."</td>";
    echo "<td>".$row['Place_of_Training']."</td>";
    echo "<td>".$row['No_of_participants']."</td>";
    echo "<td>".$row['Description_workshop']."</td>";
    echo "<td>".$row['Training_Description']."</td>";
    
    echo "<td><a href=trainingbothedit.php?id=".$row['trainingID'].">Edit</a></td>";
    echo "<td><a href=delinhouse.php?id=".$row['trainingID'].">Delete</a></td>";

}
?>
    
    
</table>
<br>
<center>

<iframe id="train_frame" src="trainingboth.php" width="100%" height="680px" style="visibility: hidden;" scrolling="yes">

</iframe>
</center>

<script>
    function myFunction994() {
    var x = document.getElementById('train_frame');
  if (x.style.visibility === 'hidden') {
    x.style.visibility = 'visible';
  } else {
   
    x.style.visibility = 'hidden';
  }

}
</script>

</body>
</html>