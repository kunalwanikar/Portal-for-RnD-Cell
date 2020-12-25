<?php include('scriptfo1.js');
session_start();
$uid=$_SESSION['uid'];
include('table.css'); 
?>
<h1>Qualification Details</h1>

<html>
<head>
<title> Qualification details</title>

</head>
<body>
    <br>
    <center><button type="submit" onclick="my1Function()" >Addnew</button></center><br><br>
<table width="1000" border ="1" cellpadding="1" cellspacing="1">
<tr>

<th>Degree level</th>
<th>Degree Name</th>
<th>College name</th>
<th>University</th>
<th>Year of passing</th>
<th>Percentage</th>
<th>Discipline</th>
<th>Passing Division</th>
<th>Upload Degree</th>
<th>Status</th>
<th>Edit</th>
<th>Delete</th>
</tr>

<?php
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'r&d');
$sql = "SELECT * FROM qualification_details WHERE UID='$uid' ";
$records = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($records)){
    echo "<tr>";
    echo "<td>".$row['Degree_level']."</td>";
    echo "<td>".$row['Degree_name']."</td>";
    echo "<td>".$row['College_name']."</td>";
    echo "<td>".$row['University']."</td>";
    echo "<td>".$row['Year_of_passing']."</td>";
    echo "<td>".$row['Percentage']."</td>";
    echo "<td>".$row['Discipline']."</td>";
    echo "<td>".$row['passing_division']."</td>";
    echo "<td>".$row['Upload_degree']."</td>";
     echo "<td>".$row['status']."</td>";
    echo "<td><a href='Principal_Qualification.php?id=".$row['qualificationID']."'>Edit</a></td>";
    echo "<td><a href='delete.php?id=".$row['qualificationID']."'>Delete</a></td>";

}
?>

</table>
<br>
<center>

<iframe id="editframe0" src="Principal_Qualification.php"  width="100%" height="480px" style="visibility: hidden;" scrolling="yes">

</iframe>
</center>
</body>
</html>