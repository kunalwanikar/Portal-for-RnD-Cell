<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "r&d";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$uid = $_SESSION['uid'];

$sql = "SELECT * FROM papers WHERE UID = '$uid' AND papersID = '".$_GET['id']."' ";
                                   

$res = $conn->query($sql);
while($rowval = $res->fetch_assoc()) {

	$journaltitle= $rowval['Title_of_papers'];
	$paperrefer= $rowval['Whether_referred'];
	$Department= $rowval['Department'];
	$papertype= $rowval['NationalORInternational'];
	$papername= $rowval['JournalORProceedingName'];
	$vnumber= $rowval['VolumeNO'];
	$pagenumber= $rowval['Page_no'];
	$publicationyr= $rowval['Publication_year'];
	$joint= $rowval['IfJoint_academic_inst'];
	$joint1= $rowval['IfJoint_RD_inst'];
	$citations= $rowval['citations'];
	$link= $rowval['download'];
	};
if(isset($_POST['submit'])){
	
    $journaltitle= $_POST['journal_title'];
	$paperrefer= $_POST['paper_refer'];
	$Department= $_POST['Department'];
	$papertype= $_POST['paper_type'];
	$papername= $_POST['paper_name'];
	$vnumber= $_POST['vnumber'];
	$pagenumber= $_POST['pagenumber'];
	$publicationyr= $_POST['publicationyr'];
	$joint= $_POST['joint'];
	$joint1= $_POST['joint1'];
	$citations= $_POST['citations'];
    $link= $_POST['link'];
 
                    $allowed = mysqli_query($conn,"UPDATE papers SET `Title_of_papers`='$journaltitle',`Papers_referred`='$paperrefer',
					`Department`='$Department',`Paper_type`='$papertype',`Journal&ProceedingName`='$papername',
					`VolumeNO`='$vnumber',`Page_no`='$pagenumber',`Publication_year`='$publicationyr',
					`IfJoint_academic_inst`='$joint',`IfJoint_R&D_inst`='$joint1',`citations`='$citations',
					`download`='$link' WHERE `UID`='$uid' AND bookID='".$_GET['id']."' ");
}
$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Papers | R&D Department | Government College of Engineering, Amravati.</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.6.0/css/mdb.min.css" rel="stylesheet">

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
	<div class="container"style="padding-top: 20px; padding-bottom: 30px;"><br>
		
		<div class="col-lg-9 m-auto d-block">
			
			
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" class="form-control z-depth-4" onsubmit="return validation()">
				<div style="padding-top: 20px;"></div>
				<h4 class="font-weight-bold"> Journals</h4>
				
				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="journal_title" class="font-weight-bold"> Title of Journal: </label>
					<input type="text" name="journal_title" class="form-control" id="j_title" autocomplete="off" value='<?php echo $journaltitle; ?>'>
					<span id="jtitle_span" class="text-danger"> </span>
				</div>
				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="journal_title" class="font-weight-bold"> Names of papers referred: </label>
					<input type="text" name="paper_refer" class="form-control" id="paper_refer" autocomplete="off" value='<?php echo $paperrefer; ?>' >
					<span id="paperreferred_span" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label class="font-weight-bold">Department :</label>
                    <select class="form-control" id="sel1" name="Department">
                    <option value="">Select Department</option>
					<option value="Computer Science And Engineering" <?php if($Department=="Computer Science And Engineering"){?> selected <?php } ?> >Computer Science And Engineering</option>
    				<option value="Information Technology" <?php if($Department=="Information Technology"){?> selected <?php } ?>  >Information Technology</option>
    				<option value="Instrumentation Engineering" <?php if($Department=="Instrumentation Engineering"){?> selected <?php } ?> >Instrumentation Engineering</option>
    				<option value="Electronics And Telecommunication Engineering" <?php if($Department=="Electronics And Telecommunication Technology"){?> selected <?php } ?> >Electronics And Telecommunication Engineering</option>
    				<option value="Electrical Engineering" <?php if($Department=="Electrical Engineering"){?> selected <?php } ?>>Electrical Engineering</option>
    				<option value="Civil Engineering"  <?php if($Department=="Civil Engineering"){?> selected <?php } ?> >Civil Engineering</option>
    				<option value="Mechanical Engineering" <?php if($Department=="Mechanical Engineering"){?> selected <?php } ?>>Mechanical Engineering</option>
					<option value="Applied Mechanics" <?php if($Department=="Applied Mechanics"){?> selected <?php } ?>>Applied Mechanics</option>
    				<option value="Applied Physics" <?php if($Department=="Applied Physics"){?> selected <?php } ?>>Applied Physics</option>
    				<option value="Applied Chemistry" <?php if($Department=="Applied Chemistry"){?> selected <?php } ?>>Applied Chemistry</option>
					<option value="Engineering mathematics" <?php if($Department=="Engineering mathematics"){?> selected <?php } ?>>Engineering mathematics</option>
  					</select>
				</div>
					<span id="dept" class="text-danger"></span>
                    <div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label class="font-weight-bold"> Published paper was?  </label>
					<div class="radio">
                    <label><input type="radio" name="paper_type" value="National" <?php if ($papertype == 'National') {echo ' checked ';} ?> >National</label>
                     </div>
                   <div class="radio">
                        <label><input type="radio" name="paper_type" value="International" <?php if ($papertype == 'International') {echo ' checked ';} ?> >International</label>
                     </div>
				</div>
				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="journal_title" class="font-weight-bold"> Journal/Proceding Name : </label>
					<input type="text" name="paper_name" class="form-control" id="journal_name" autocomplete="off" value='<?php echo $papername; ?>'>
					<span id="journalname" class="text-danger"> </span>
				</div>

                

				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					 <label for="volumenumber" class="font-weight-bold">  Volume Number: </label>
					 <input type="text" class="form-control" id="volno" name="vnumber" autocomplete="off" value='<?php echo $vnumber; ?>'>
					 <span id="volnumber" class="text-danger"> </span>
				</div>

                <div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="patent_no" class="font-weight-bold">Number of Pages: </label>
					<input type="text" class="form-control" id="pageno" name="pagenumber" autocomplete="off" value='<?php echo $pagenumber; ?>'>
					<span id="pagenumber_span" class="text-danger"> </span>
				</div>
                <div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="patent_no" class="font-weight-bold">Publication Date/Year: </label><br>
					<input type="date" id="publyr" name="publicationyr" value='<?php echo $publicationyr; ?>'>
					<br><label class="text-primary text-center"> If only year is known to you then please enter 1 january of the corresponding year</label><br>
					<span id="publicationyear" class="text-danger"> </span>
				</div>

                <div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label class="font-weight-bold"> Whether joint with any academic institute?  </label>
					<div class="radio">
                    <label><input type="radio" name="joint" value="yes" <?php if ($joint == 'yes') {echo ' checked ';} ?> >Yes</label>
                     </div>
                   <div class="radio">
                        <label><input type="radio" name="joint" value="no" <?php if ($joint == 'no') {echo ' checked ';} ?> >No</label>
                     </div>
				</div>
                <span id="joint_academy" class="text-danger"> </span>

                
                <div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label class="font-weight-bold"> Whether joint with any Research and Development Institute?  </label>
					<div class="radio">
                    <label><input type="radio" name="joint1" value="yes" <?php if ($joint1 == 'yes') {echo ' checked ';} ?> >Yes</label>
                     </div>
                   <div class="radio">
                        <label><input type="radio" name="joint1" value="no" <?php if ($joint1 == 'no') {echo ' checked ';} ?> >No</label>
                     </div>
				</div>
                <span id="joint_r&d" class="text-danger"> </span>
                
				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="inv" class="font-weight-bold"> Citations: </label>
					<input type="text" name="citations" class="form-control" id="citation" autocomplete="off" value='<?php echo $citations; ?>'>
                    <br><label class="text-danger text-center"> Enter names of another sources from where some material is taken.</label><br>
					<span id="Citations" class="text-danger"> </span>
				</div>
                
                <div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label for="inv" class="font-weight-bold">Downloads: </label>
					<input type="text" name="link" class="form-control" id="download" autocomplete="off" value='<?php echo $link; ?>'>
                    <br><label class="text-danger text-center">You can provide link for downloading the journal here.</label><br>
                    <span id="Download" class="text-danger"> </span>
				</div>				

				<center><input type="submit" name="submit" value="submit" class="btn btn-info" autocomplete="off"></center>
				<div style="padding-top: 40px;"></div>

				</form>
		</div>
	</div>


<!--JAVASCRIPT-->
	<script type="text/javascript">
		

		function validation(){

			var journal_title = document.getElementById('j_title').value;
			var paper_refer= document.getElementById('paper_refer').value;
			var Department = document.getElementById('sel1').value;
			var paper_name = document.getElementById('journal_name').value;
			var vnumber = document.getElementById('volno').value;
			var pagenumber = document.getElementById('pageno').value;
			var pulicationyr = document.getElementById('publyr').value;
			var citations = document.getElementById('citation').value;
			var link = document.getElementById('download').value;
			
			if(journal_title == ""){
				document.getElementById('jtitle_span').innerHTML =" **Please fill the patent title field";
				return false;
			}
			if((journal_title.length <= 2) || (journal_title.length > 50)) {
				document.getElementById('jtitle_span').innerHTML =" **Length must be between 2 and 50";
				return false;	
			}
			if(paper_refer == ""){
				document.getElementById('paperreferred_span').innerHTML =" **Please fill the patent title field";
				return false;
			}
			if(!isNaN(paper_refer)){
				document.getElementById('paperreferred_span').innerHTML =" **Only characters  are allowed";
				return false;
			}


			if(paper_name == ""){
				document.getElementById('journalname').innerHTML =" **Only characters  are allowed";
				return false;
			}
			if(!isNaN(paper_name)){
				document.getElementById('journalname').innerHTML =" **Only characters  are allowed";
				return false;
			}
            if(vnumber == ""){
				document.getElementById('volnumber').innerHTML =" **Enter the volume number of Journal";
				return false;
			}

			if(isNaN(vnumber)){
				document.getElementById('volnumber').innerHTML =" **Only Digits are allowed";
				return false;
			}
			if(pagenumber == ""){
				document.getElementById('pagenumber_span').innerHTML =" **Enter the Number of Pages";
				return false;
			}
			if(isNaN(pagenumber)){
				document.getElementById('pagenumber_span').innerHTML =" **Only Digits are allowed";
				return false;
			}
			if(publicationyr == ""){
				document.getElementById('publicationyear').innerHTML =" **Please fill the Publication year";
				return false;
			}
			if((publicationyr.length>4)) {
				document.getElementById('jtitle_span').innerHTML =" **Please fill the valid year value";
				return false;	
			}


			if(citations== ""){
				document.getElementById('citation').innerHTML =" **Please enter names of sources from where some content is taken";
				return false;
			}

		

			
			if(!isNaN(citations)){
				document.getElementById('citation').innerHTML =" **Only characters are allowed ";
				return false;
			}
			if(link == ""){
				document.getElementById('download').innerHTML =" **Provide the link for download of your journal";
				return false;
			}
		}
	</script>



<!--JAVASCRIPT-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>



