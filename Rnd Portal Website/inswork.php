<?php
include('table.css');
session_start(); 
?>

<html>
<head>

</head>
<body>  
<br>
<br>
<center><button type="submit" onclick="myFunction997()" >Addnew</button></center><br><br>
<!--
<table width="600" border ="1" cellpadding="1" cellspacing="1">
<tr>
  
<th>Role</th>
<th>Date From</th>
<th>Date To</th>
<th>Work description</th>
<th>Edit</th>
<th>Delete</th>
</tr>

</table>
<br>
-->
<center>

<iframe id="inswork_frame" src="workshop_org.php" width="100%" height="680px" style="visibility: hidden;" scrolling="yes">

</iframe>

</center>

<script>
function myFunction997() {
    var x = document.getElementById('inswork_frame');
  if (x.style.visibility === 'hidden') {
    x.style.visibility = 'visible';
  } else {
    x.style.visibility = 'hidden';
  }

}
</script>

</body>
</html>