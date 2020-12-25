<script>
confirm("Are you sure you want to delete?");
</script>
<?php
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'r&d');
$sql = "DELETE FROM patents WHERE patentsID='$_GET[id]'";
$records = mysqli_query($con,$sql);

if(mysqli_query($con,$sql))
     header("refresh:0.25; url=pubtab.php");
else 
     echo"Not Deleted";     
?>