<?php 
session_start();
include('scriptfo3.js');
include('table.css'); 
?>

<h1>Patents</h1>
<br><br>
<html>
<head>
<title> Publications</title>

</head>
<body>

<center><button type="submit" onclick="my2Function()" >Addnew</button></center>
<br>
<table width="1600" border ="1" cellpadding="1" cellspacing="1">
<tr>
<th>Department</th>
<th>Obtained/Filed</th>
<th>Patent Registered</th>
<th>Patent Title</th>
<th>Patent Type</th>
<th>Patent Number</th>
<th>Patent Grant Date/Year</th>
<th>Patent Commercialized</th>
<th>Commercialized Date</th>
<th>Amount</th>
<th>Joint with Institution</th>
<th>Edit</th>
<th>Delete</th>
</tr>




<?php

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'r&d');
$sql = "SELECT * FROM patents WHERE UID = '".$_SESSION["uid"]."' ";
$records = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($records)){

    echo "<tr>";
    echo "<td>".$row['Department']."</td>";
    echo "<td>".$row['ObtainedORFile']."</td>";
    echo "<td>".$row['Patent_Registered']."</td>";
    echo "<td>".$row['Patent_Title']."</td>";
    echo "<td>".$row['Patent_Type']."</td>";
    echo "<td>".$row['Patent_Number']."</td>";
    echo "<td>".$row['Patent_Grant_Year']."</td>";
    echo "<td>".$row['Commercialized_or_Not']."</td>";
    echo "<td>".$row['Commercialized_Date']."</td>";
    echo "<td>".$row['Amount']."</td>";
    echo "<td>".$row['Joint_with_inst']."</td>";
    echo "<td><a href=patentsedit.php?id=".$row['patentsID'].">Edit</a></td>";
    echo "<td><a href=delpatents.php?id=".$row['patentsID']." >Delete</a></td>";
}
?>

</table>
<br>
<center>

<iframe id="editframe1" src="patents.php"  width="100%" height="680px" style="visibility: hidden;"  scrolling="yes">

</iframe>
</center>

</body>
</html>



