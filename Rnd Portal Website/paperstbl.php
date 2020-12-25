<?php 
include('scriptfo3.js');
include('table.css');
?>

<h1>Papers</h1>
<br><br>
<html>
<head>
<title> Publications</title>

</head>
<body>
    <center><button type="submit" onclick="my3Function()" >Addnew</button></center><br>
<table width="1900" border ="1" cellpadding="1" cellspacing="1">
<tr>
<th>Title</th>
<th>Department</th>
<th>National/International</th>
<th>Journal/Proceeding Name</th>
<th>Volume number</th>
<th>Page number</th>
<th>Publication Date/Year</th>
<th>Whether joined Institution</th>
<th>Whether joined R&D institution</th>
<th>Citations</th>
<th>Download</th>
<th>Edit</th>
<th>Delete</th>
</tr>

<?php
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'r&d');
$sql = "SELECT * FROM papers WHERE UID='".$_SESSION['uid']."' ";
$records = mysqli_query($con,$sql);

error_reporting(0);
ini_set('display_errors', 0);

while($row = mysqli_fetch_array($records)){

    echo "<tr>";
    echo "<td>".$row['Title_of_papers']."</td>";
    echo "<td>".$row['Department']."</td>";
    echo "<td>".$row['NationalORInternational']."</td>";
    echo "<td>".$row['JournalORProceedingName']."</td>";
    echo "<td>".$row['VolumeNO']."</td>";
    echo "<td>".$row['Page_no']."</td>";
    echo "<td>".$row['Publication_year']."</td>";
    echo "<td>".$row['IfJoint_academic_inst']."</td>";
    echo "<td>".$row['IfJoint_RD_inst']."</td>";
    echo "<td>".$row['citations']."</td>";
    echo "<td><a>".$row['download']."</a></td>";
    echo "<td><a href=papersedit.php?id=".$row['papersID'].">Edit</a></td>";
    echo "<td><a href=delpapers.php?id=".$row['papersID'].">Delete</a></td>";
}
?>
</table>
<br>

<iframe id="editframe2" src="papers.php"  width="100%" height="680px" style="visibility: hidden;" scrolling="yes">

</iframe>
</center>

</body>
</html>