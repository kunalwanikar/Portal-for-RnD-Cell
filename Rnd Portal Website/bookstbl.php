<?php
session_start();
include('scriptfo3.js');
include('table.css'); 
$uid = $_SESSION['uid'];
?>
<h1>Books
<br><br>

<html>
<head>
<title> Publications</title>

</head>
<body>
    <center><button type="submit" onClick="my1Function()" >Addnew</button></center><br>
<table width="1000" border ="1" cellpadding="1" cellspacing="1">
<tr>
<th>Belongs to College of Engineering ?</th>
<th>Book Type</th>
<th>Department</th>
<th>Publisher Name</th>
<th>Title</th>
<th>Author Type</th>
<th>Number of pages</th>
<th>ISBN Number</th>
<th>Publication Date</th>
<th>Edit</th>
<th>Delete</th>
</tr>

<?php
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'r&d');
$sql = "SELECT * FROM books WHERE UID = '$uid' ";
$records = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($records)){

    echo "<tr>";
    echo "<td>".$row['Belongs_to_COE']."</td>";
    echo "<td>".$row['Book_Type']."</td>";
    echo "<td>".$row['Department']."</td>";
    echo "<td>".$row['Publisher_Name']."</td>";
    echo "<td>".$row['Title']."</td>";   
    echo "<td>".$row['author_type']."</td>";
    echo "<td>".$row['Number_of_pages']."</td>";
    echo "<td>".$row['ISBN_no']."</td>";
    echo "<td>".$row['Publication_date']."</td>";
    echo "<td><a href=booksedit.php?id=".$row['bookID'].">Edit</a></td>";
    echo "<td><a href=delbooks.php?id=".$row['bookID'].">Delete</a></td>";
}
?>
 

</table>
<br>
<center>

<iframe id="frame" src="books.php" width="100%" height="680px" style="visibility: hidden;" scrolling="yes">

</iframe>
</center>
</body>
</html>



