
<?php include('scriptfo1.js');
include('table.css'); 
?>

<html>
<head>
<title> Qualification details</title>

</head>
<body>
<h1>Teaching Experience
    <br><br><center><button type="submit" onclick="my2Function()">Addnew</button></center><br><br>

<table width="1000" border ="1" cellpadding="1" cellspacing="1">
<tr>

<th>Designation</th>
<th>Degree Level</th>
<th>College name</th>
<th>Department</th>
<th>Date of Joining</th>
<th>Date of Leaving</th>
<th>Experience Years</th>
<th>Experience Months</th>
<th>Edit</th>
<th>Delete</th>

</tr>



<?php
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'r&d');
$sql = "SELECT * FROM experience_teaching";
$records = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($records)){

    echo "<tr>";
    echo "<td>".$row['Appointed_as']."</td>";
    echo "<td>".$row['Degree_level']."</td>";
    echo "<td>".$row['College_name']."</td>";
    echo "<td>".$row['Department']."</td>";
    echo "<td>".$row['Date_of_joining']."</td>";
    echo "<td>".$row['Date_of_leaving']."</td>";
    echo "<td>".$row['Exp_yr']."</td>";
    echo "<td>".$row['Exp_month']."</td>";
    echo "<td><a href=delete.php?id=".$row['Date_of_joining'].">Edit</a></td>";
    echo "<td><a href=delexpteaching.php?id=".$row['Date_of_joining'].">Delete</a></td>";
    echo "</tr>";
}
?>
</table>
<br>
<center>

<iframe id="editframe1" src="teaching_exp.php" id="frame" width="100%" height="480px" style="visibility: hidden;" scrolling="yes">

</iframe>

</center>

</body>
</html>