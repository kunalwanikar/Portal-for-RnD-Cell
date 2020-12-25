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


$sql = "SELECT * FROM books where UID = '$uid' AND bookID = '".$_GET['id']."' ";

error_reporting(0);
ini_set('display_errors', 0);
                                   

$res = $conn->query($sql);
while($rowval = $res->fetch_assoc()) {

	$booktitle= $rowval['Title'];
	$belonging= $rowval['Belongs_to_COE'];
	$booktype= $rowval['Book_Type'];
	$department= $rowval['Department'];
	$authtype= $rowval['author_type'];
	$isbnnumber= $rowval['ISBN_no'];
	$publishername= $rowval['Publisher_Name'];
	$publication_date= $rowval['Publication_date'];
	$noofpages= $rowval['Number_of_pages'];
	$bookid = $rowval['bookID'];
     
	};

if(isset($_POST['submit'])){

    $booktitle= $_POST['booktitle'];
	$belonging= $_POST['belonging'];
	$booktype= $_POST['book_type'];
	$department= $_POST['department'];
    $authtype= $_POST['auth_type'];
	$isbnnumber= $_POST['isbnnumber'];
	$publishername= $_POST['publishername'];
	$publication_date= $_POST['pbl_date'];
	$noofpages= $_POST['pages_no'];
	$id= $_POST['id_book'];
     
	$allowed = mysqli_query($conn,"UPDATE books SET `Title`='$booktitle', `Belongs_to_COE`='$belonging',`Book_Type`='$booktype',`Department`='$department',`Author_Type`='$authtype', `ISBN_no`='$isbnnumber',`Publisher_Name`='$publishername',`Publication_date`= '$publication_date',`Number_of_pages`='$noofpages' WHERE 'UID'='$uid' AND bookID= '$id' ");

}

$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Books || R&D Department || Government College of Engineering, Amravati.</title>
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
<div class="container" style="padding-bottom: 30px; padding-top: 30px;">
<body>
	
		
		<div class="col-lg-9 m-auto d-block">
			
		</div>
			
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" class="form-control z-depth-4" onsubmit="return validation()">
				<div style="padding-top: 30px;"></div>
				
				<div class="form-group col-lg-11 col-md-11 col-xs-11">
				<h4 class="font-weight-bold"> Books</h4>
					<label for="bk_title" class="font-weight-bold"> Book Title: </label>
					<input type="text" name="booktitle" class="form-control" id="b_title" autocomplete="off" value='<?php echo $booktitle; ?>' >
					<span id="book_title" class="text-danger"> </span>
				</div>
				
				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label class="font-weight-bold"> Book belongs to college of Engineering?  </label>
					<div class="radio">
                    <label><input type="radio" name="belonging" value="Yes" id="belong" <?php if ($belonging == 'Yes') {echo ' checked ';} ?> >Yes</label>
                     </div>
                   <div class="radio">
                        <label><input type="radio" name="belonging" value="No" id="belong" <?php if ($belonging == 'No') {echo ' checked ';} ?> >No</label>
                     </div>
				</div>
					<span id="belongs" class="text-danger"></span>

				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label class="font-weight-bold">Book Type :</label>
                    <select class="form-control" id="sel1" name="book_type">
                    <option value="Monograph" <?php if($booktype=="Monograph"){?> selected <?php } ?> >Monograph</option>
    				<option value="Technical Reports" <?php if($booktype=="Technical Report"){?> selected <?php } ?> >Technical reports</option>
    				<option value="Other" <?php if($booktype=="Other"){?> selected <?php } ?>>Other</option>
    				
  					</select>
				</div>
				<span id="book" class="text-danger"></span>

				
				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label class="font-weight-bold">Department :</label>
                    <select class="form-control" id="sel2" name="department">
                     <option value=" ">Select Department</option>
                    <option value="Computer Science And Engineering" <?php if($department=="Computer Science And Engineering"){?> selected <?php } ?> >Computer Science And Engineering</option>
    				<option value="Information Technology" <?php if($department=="Information Technology"){?> selected <?php } ?>  >Information Technology</option>
    				<option value="Instrumentation Engineering" <?php if($department=="Instrumentation Engineering"){?> selected <?php } ?> >Instrumentation Engineering</option>
    				<option value="Electronics And Telecommunication Engineering" <?php if($department=="Electronics And Telecommunication Technology"){?> selected <?php } ?> >Electronics And Telecommunication Engineering</option>
    				<option value="Electrical Engineering" <?php if($department=="Electrical Engineering"){?> selected <?php } ?>>Electrical Engineering</option>
    				<option value="Civil Engineering"  <?php if($department=="Civil Engineering"){?> selected <?php } ?> >Civil Engineering</option>
    				<option value="Mechanical Engineering" <?php if($department=="Mechanical Engineering"){?> selected <?php } ?>>Mechanical Engineering</option>
					<option value="Applied Mechanics" <?php if($department=="Applied Mechanics"){?> selected <?php } ?>>Applied Mechanics</option>
    				<option value="Applied Physics" <?php if($department=="Applied Physics"){?> selected <?php } ?>>Applied Physics</option>
    				<option value="Applied Chemistry" <?php if($department=="Applied Chemistry"){?> selected <?php } ?>>Applied Chemistry</option>
					<option value="Engineering mathematics" <?php if($department=="Engineering mathematics"){?> selected <?php } ?>>Engineering mathematics</option>
  					</select>
				</div>
					<span id="dept" class="text-danger"></span>
                
					<div class="form-group col-lg-4 col-md-4 col-xs-4" >
					<label class="font-weight-bold"> Author type ?  </label>
					<div class="radio">
                    <label><input type="radio" name="auth_type" value="Author" <?php if ($authtype == 'Author') {echo ' checked ';} ?> >Author</label>
                     </div>
                   <div class="radio">
                        <label><input type="radio" name="auth_type" value="CoAuthor" <?php if ($authtype == 'CoAuthor') {echo ' checked ';} ?> >Co-Author</label>
                     </div>
				</div>
					
				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label class="font-weight-bold"> ISBN Number: </label>
					<input type="text" name="isbnnumber" class="form-control" id="isbn_no" autocomplete="off" value='<?php echo $isbnnumber; ?>' >
					<span id="isbn_number" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label class="font-weight-bold"> Publisher's Name: </label>
                    <input type="text" name="publishername" class="form-control" id="publ" autocomplete="off" value='<?php echo $publishername; ?>'>
					<span id="publisher_name" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-11 col-md-11 col-xs-11">
				    <label class="font-weight-bold"> Publication Date </label><br>
				    <input type="date" name="pbl_date" id="publ_date" value="<?php echo $publication_date ?>">
				    </div>
				
				<div class="form-group col-lg-11 col-md-11 col-xs-11">
					<label class="font-weight-bold"> Number Of Pages: </label>
					<input type="text" name="pages_no" class="form-control " id="nop" autocomplete="off" value='<?php echo $noofpages; ?>'>
					<span id="nops" class="text-danger"> </span>
				</div>

	<input type="hidden" name="id_book" class="form-control" autocomplete="off" value='<?php echo $_GET['id']; ?>' >

				<center><input type="submit" name="submit" value="submit" class="btn btn-info" autocomplete="off" ></center>
				<div style="padding-top: 40px;"></div>

			</form>
		</div>
	</div>



<!--JAVASCRIPT-->
	<script type="text/javascript">
		

		function validation(){

			var b_title = document.getElementById('b_title').value;
			var isbn_no = document.getElementById('isbn_no').value;
			
			var publ = document.getElementById('publ').value;
			var nop = document.getElementById('nop').value;
		
			var publ_date = document.getElementById('publ_date').value;
			






			if(b_title == ""){
				document.getElementById('book_title').innerHTML =" **Please fill the Book Title field";
				return false;
			}


			if(athr_name == ""){
				document.getElementById('author_name').innerHTML =" **Please fill the Author Name field";
				return false;
			}
			if(!isNaN(athr_name)){
				document.getElementById('author_name').innerHTML =" **Only characters are allowed";
				return false;
			}



			if(isbn_no == ""){
				document.getElementById('isbn_number').innerHTML ="**Please fill the ISBN Number field 10 digits (till 2006 books) or 13 digits ";
				return false;
			}
			if(isNaN(isbn_no)){
				document.getElementById('isbn_number').innerHTML ="**User must enter only digits";
				return false;
			}


			if(publ == ""){
				document.getElementById('publisher_name').innerHTML =" **Please fill the Publisher Name field";
				return false;
			}
			if(!isNaN(publ)){
				document.getElementById('publisher_name').innerHTML =" **Only characters are allowed";
				return false;
			}


			if(publ_date == ""){
				document.getElementById('dates').innerHTML ="**Please a valid date";
				return false;
			}


			if(nop == ""){
				document.getElementById('nops').innerHTML ="**Please enter number of pages";
				return false;
			}
			if(isNaN(nop)){
				document.getElementById('nops').innerHTML ="**User must enter only digits";
				return false;		
		}
				

	}
	</script>
</script>
<!--JAVASCRIPT-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>


</body>
</html>




