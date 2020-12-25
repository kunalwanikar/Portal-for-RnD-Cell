<script>
confirm("Are you sure you want to delete?");
</script>
<?php
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'r&d');
$sql = "DELETE FROM experience_teaching WHERE texpID='$_GET[id]'";
$records = mysqli_query($con,$sql);

if(mysqli_query($con,$sql))
     header("refresh:0.25; url=texptbl.php");
else 
     echo"Not Deleted";     
?>