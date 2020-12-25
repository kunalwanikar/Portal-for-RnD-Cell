<h1>Externally Funded Projects
<br><br>

<html>
<head>

<title> Externally Funded Projects</title>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>
<table width="2000" border ="1" cellpadding="1" cellspacing="1">
<tr>
<th>Belongs to College of Engineering</th>
<th>Department</th>
<th>Project Title</th>
<th>Name of Pricipal Investigator</th>
<th>Nature of Project</th>
<th>Sponsored By</th>
<th>Total Project Fund</th>
<th>Date From</th>
<th>Date To</th>
<th>Project Status</th>
<th>Ownership</th>
<th>Joint with</th>
<th>Joint belongs to</th>
<th>Edit</th>
<th>Delete</th>
<tr>




<?php

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'r&d');
$sql = "SELECT * FROM externally_funded_projects";
$records = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($records)){

    echo "<tr>";
    echo "<td>".$row['Belongs_to_COE']."</td>";
    echo "<td>".$row['Department']."</td>";
    echo "<td>".$row['Project_Title']."</td>";
    echo "<td>".$row['Name_of_principal_investigator']."</td>";
    echo "<td>".$row['Nature_of_Project']."</td>";
    echo "<td>".$row['SponsoredBy']."</td>";
    echo "<td>".$row['Total_Project_Fund']."</td>";
    echo "<td>".$row['Date_From']."</td>";
    echo "<td>".$row['Date_to']."</td>";
    echo "<td>".$row['Project_Status']."</td>";
    echo "<td>".$row['Ownership']."</td>";
    echo "<td>".$row['Joint_with']."</td>";
    echo "<td>".$row['Joint_Belongs_to']."</td>";
    echo "<td><a href=delete.php?id=".$row['Project_Title'].">Edit</a></td>";
    echo "<td><a href=delextfundproj.php?id=".$row['Project_Title'].">Delete</a></td>";

}
?>

</table>
<br>
<center><button type="submit"  onclick="myFunction()" >Addnew</button>

<iframe id="editframe" src="externally_funded_projects.php"  width="100%" height="680px" style="visibility: hidden;" scrolling="yes" visibility="None">

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
