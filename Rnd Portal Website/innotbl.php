
<?php include('scriptfo3.js');
include('table.css'); 
session_start();
$uid= $_SESSION['uid'];
?>

<html>
<head>
<title> Publications</title>

</head>


<h1>Innovations
<br><br>
<center><button type="submit" onclick="my4Function()" >Addnew</button></center><br><br>


<table width="1600" border ="1" cellpadding="1" cellspacing="1">
<tr>
<th>Innovation Title</th>
<th>Department</th>
<th>Innovation_date</th>
<th>Product/Process</th>
<th>Technology Transfer</th>
<th>Transfer date</th>
<th>Organisation Name</th>
<th>Commercialized or Not</th>
<th>Amount</th>
<th>Commercialized Date</th>
<th>Edit</th>
<th>Delete</th>
</tr>




<?php

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'r&d');
$sql = "SELECT * FROM innovations WHERE UID='$uid' " ;
$records = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($records)){

    echo "<tr>";
    echo "<td>".$row['Innovation_title']."</td>";
    echo "<td>".$row['Department']."</td>";
    echo "<td>".$row['Innovation_date']."</td>";
    echo "<td>".$row['ProductORprocess']."</td>";
    echo "<td>".$row['TechnologyTransfer']."</td>";
    echo "<td>".$row['Transfer_Date']."</td>";
    echo "<td>".$row['Org_name']."</td>";
    echo "<td>".$row['Commercialized_orNot']."</td>";
    echo "<td>".$row['Amount']."</td>";
    echo "<td>".$row['Commercialized_Date']."</td>";
    echo "<td><a href=innovationedit.php?id=".$row['innovationID'].">Edit</a></td>";
    echo "<td><a href=delinno.php?id=".$row['innovationID'].">Delete</a></td>";

}

?>

</table>
<br>
<center>

<iframe id="editframe3" src="innovation.php"  width="100%" height="1750px" style="visibility: hidden;" scrolling="yes">

</iframe>
</center>

</body>
</html>