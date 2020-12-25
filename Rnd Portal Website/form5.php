<?php
if(isset($_POST['submit'])){
$dfrom = $_POST['mydate'];
$dto = $_POST['myDate1'];
$tbl = $_POST['radio'];
setcookie('datefrom',$dfrom);
setcookie('dateto',$dto);
setcookie('tblname',$tbl);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Report</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.6.1/css/mdb.min.css" rel="stylesheet">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.6.0/js/mdb.min.js"></script>

</head>
<body>
<div class="container" style="padding-bottom: 30px; padding-top: 30px;"><br>
<form class="form-control z-depth-4" method="post" action="form6.php">


<?php
if (isset($_POST['submit'])) {
    $x = 1;
if(isset($_POST['radio']) ){
if($_POST['radio']== 'books')
{
$nc = 9 ;
while($x <= $nc) {
    ?>
    <select name="col[]">
    <option  selected="selected"></option>
    <option  value="Belongs_to_COE">  whether the book belongs to college or not</option>
    <option  value="Book_Type">Book Type</option>
    <option  value="new_registration.Department">Department</option>
    <option  value="Publisher_Name">Publisher's Name</option>
    <option  value="author_type">Author/Co-Author</option>
    <option  value="Title">Title of Book</option>
    <option  value="Number_of_pages">Number Of Pages</option>
    <option  value="ISBN_no">ISBN Number</option>
    <option  value="Publication_date">Publication date</option>
    </select> 
    
  <?php  
    $x++;
} ?>
<center>
<input type="submit" name="submit1" value="Get Selected Values" />
</center>
<?php
}
elseif( $_POST['radio']== 'patents')
{
$nc = 11 ;
while($x <= $nc) {
    ?>
        <select name="col[]">
        <option  selected="selected"></option>
        <option  value="new_registration.Department"> Department</option>
        <option  value="ObtainedORFile">whether the patent is obtained or filed</option>
        <option  value="Patent_Registered">Patent Registered National/International</option>
        <option  value="Patent_Title">Patent Title</option>
        <option  value="Patent_Type">Patent Type: Product/Process</option>

        <option  value="Patent_Number">Patent Number</option>
        <option  value="Patent_Grant_Year">Patent Grant Year</option>
        <option  value="Commercialized_or_Not">whether the patent is commercialized or not</option>
        <option  value="Commercialized_Date"> date when the patent was commercialized</option>
        <option  value="Amount">amount invested in patent (in Rs.)</option>
        <option  value="Joint_with_inst">Joint with Academic Institute/ R&D Institute/ Institute</option>

        
    </select> 
<?php
 $x++;
}?>
<center>
<input type="submit" name="submit1" value="Generate report" />
</center>
<?php }
elseif( $_POST['radio']== 'papers')
{
$nc = 12 ;
while($x <= $nc) {
    ?>
    <select name="col[]">
        <option  selected="selected"></option>
        <option  value="Title_of_papers"> Title of Paper</option>
        <option  value="Whether_referred">Name of Papers referred</option>
        <option  value="new_registration.Department">Department</option>
        <option  value="NationalORInternational"> whether the paper published was national/International</option>
        <option  value="JournalORProceedingName">the journal/Proceeding name</option>

        <option  value="VolumeNO">the volume no.of paper</option>
        <option  value="Page_no">the no.of pages</option>
        <option  value="Publication_year">the year when it was published</option>
        <option  value="IfJoint_academic_inst">whether the user has joint any academic institute or not</option>
        <option  value="IfJoint_RD_inst"> whether the user has joint any R&D Institute or not</option>
        <option  value="citations">citations</option>
        <option  value="download">download</option>
    </select> 
    
    <?php  
        $x++;
} ?>
<center>
<input type="submit" name="submit1" value="Generate report" />
</center>
<?php }
elseif( $_POST['radio']== 'conferences')
{
$nc = 5 ;
while($x <= $nc) {
    ?>
   <select name="col[]">
        <option  selected="selected"></option>
        <option  value="Date_From">Date from</option>
        <option  value="Date_to">Date to</option>
        <option  value="Title">Title</option>
        <option  value="Broad_area">Broad Area</option>
        <option  value="Description">Description</option>
    </select>
    
     <?php   $x++;
} ?>
<center>
<input type="submit" name="submit1" value="Generate report" />
</center>
<?php }
elseif(isset($_POST['radio']) && $_POST['radio']== 'workshops')
{
$nc = 9 ;
while($x <= $nc) {
    ?>
    <select name="col[]">
    <option  selected="selected"></option>
    <option  value="new_registration.Department"> Department</option>
    <option  value="Title">the Topic for Workshop</option>
    <option  value="Date_from">the date from when the workshop was started</option>
    <option  value="Date_to"> the date till the workshop was attended</option>
    <option  value="Broad_area">the area on which the workshop was attended</option>

    <option  value="No_of_participants">the no. of participants present </option>
    <option  value="Amount">the amount invested in the workshop</option>
    <option  value="Under_TEQIP_or_Not">whether the workshop was under TEQIP or not</option>
    <option  value="Description">Description</option>
    
</select>

<?php
        $x++;
}?>
<center>
<input type="submit" name="submit1" value="Generate report" />
</center>
<?php }
elseif( $_POST['radio']== 'innovations')
{
$nc = 8 ;
while($x <= $nc) {
    ?>
    <select name="col[]">
    <option  value=" "></option>
    <option  value="new_registration.Department"> Department</option>
    <option  value="Innovation_date">the date when the innovation was done</option>
    <option  value="ProductORprocess">whether the innovation is related to product or process</option>
    <option  value="TechnologyTransfer">whether their was any technology transfer or not</option>
    <option  value="Org_name">Name of the organization to whom the innovation was transferred</option>
    <option  value="Commercialized_orNot">whether the innovation is commercialized or not</option>
    <option  value="Amount">Enter the amount invested in innovation</option>
    <option  value="Commercialized_Date">the date when the innovation was commercialized</option>
    
</select>

<?php
$x++;
}
?>
<center>
<input type="submit" name="submit1" value="Generate report" />
</center>
<?php }
elseif($_POST['radio']== 'externally_funded_projects')
{
$nc = 13 ;
while($x <= $nc) {
    ?>
     <select name="col[]">
     <option  value=" "></option>
    <option  value="Belongs_to_COE"> whether the project belongs to institute or not</option>
    <option  value="new_registration.Department">Department</option>
    <option  value="Project_Title">title of project</option>
    <option  value="Name_of_principal_investigator">Patent the name of principal Investigator_Title</option>
    <option  value="Nature_of_Project">the nature of project </option>
    <option  value="SponsoredBy">the name of organization who sponsored the project</option>
    <option  value="Total_Project_Fund">the total fund invested in the project</option>
    <option  value="Date_From" >the date from since when the project was started</option>
    <option  value="Date_to">the date till  the project was completed</option>
    <option  value="Project_Status">the status of project whether it is completed or ongoing</option>
    <option  value="Ownership">the ownership of project whether it is joint or independent</option>
    <option  value="Joint_with">whether the project was joint with any below organization</option>
    <option  value="Joint_Belongs_to"> whether the joint belongs to below options</option>
    
</select>

<?php
        $x++;
} ?>
<center>
<input type="submit" name="submit11" value="Generate report" />
</center>
<?php }
elseif($_POST['radio']== 'trainings')
{
$nc = 6 ;
while($x <= $nc) {
    ?>
    <select name="col[]">
    <option  value=" "></option>
    <option  value="Time_Duration">how many weeks the training lasted_Registered</option>
    <option  value="No_of_participants">No. of Participants involed in workshop/Training </option>
    <option  value="Subject">To improve on which area the training was conducted</option>
    <option  value="Place_of_Training">Place Where training was conducted</option>
    <option  value="No_of_participants">No. of Participants involed in workshop/Training</option>
    <option  value="Training_Description">brief description about conducted  Training</option>
    
   </select>
    
<?php
        $x++;
} ?>
<center>
<input type="submit" name="submit1" value="Generate report" />
</center>
<?php }
else{ echo "<span>Please choose a radio button.</span>";}
}


}




?>
</form>

</div>

</body>



</html> 
