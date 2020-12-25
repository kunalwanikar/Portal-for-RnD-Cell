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

	$uid_books= $_SESSION['uid'];                        

if(isset($_POST['submit'])){

	$chars = "0123456789abcdefghijklmnopqrstuvwxyz";
    $bookid = substr( str_shuffle( $chars ), 0, 7 );
    $booktitle= $_POST['booktitle'];
	$belonging= $_POST['belonging'];
	$booktype= $_POST['book_type'];
	$department= $_POST['department'];
    $authtype= $_POST['auth_type'];
	$isbnnumber= $_POST['isbnnumber'];
	$publishername= $_POST['publishername'];
	$publication_date= $_POST['pbl_date'];
	$noofpages= $_POST['pages_no'];

	$query_dupl = mysqli_query($conn, "SELECT * FROM books WHERE bookID='$bookid'");

			if(mysqli_num_rows($query_dupl) > 0 ) { //check if there is already an entry for that username
				echo"<br>";
				echo "<font color=red size=4 >";
				echo"<center><b>";
				echo "Sorry fo the inconvenience, Please try again!";
				echo"</b></center>";
			}
			else{
 
                    $allowed = mysqli_query($conn,"INSERT INTO books(Title, Belongs_to_COE, Book_Type, Department, Author_Type, ISBN_no, Publisher_Name, Publication_date, Number_of_pages, bookID, UID)
					VALUES ('$booktitle','$belonging','$booktype','$department','$authtype', '$isbnnumber','$publishername','$publication_date','$noofpages','$bookid','$uid_books' )");

					echo "Data Saved!";
}
}
$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Books | R&D Department | Government College of Engineering, Amravati.</title>
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
	
		
		<div class="col-lg-12 col-md-12 col-xs-12">
			
		</div>
			
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" class="form-control z-depth-4" onsubmit="return validation()">
				<div style="padding-top: 30px;"></div>
				<h4 class="font-weight-bold"> Books</h4>
				<div class="row">
					<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label for="bk_title" class="font-weight-bold"> Book Title: </label>
					<input type="text" name="booktitle" class="form-control" id="b_title" autocomplete="off">
					<span id="book_title" class="text-danger"> </span>
					</div>
					<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label class="font-weight-bold"> Book belongs to college of Engineering?  </label>
					<div class="radio">
                    <label><input type="radio" name="belonging" value="Yes" id="belong">Yes</label>
                     </div>
                    <div class="radio">
                        <label><input type="radio" name="belonging" value="No" id="belong">No</label>
                     </div>
					<span id="belongs" class="text-danger"></span>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label class="font-weight-bold">Book Type :</label>
                    <select class="form-control" id="sel1" name="book_type">
                    <option value=" ">Select Book Type </option>
                    <option value="Monograph">Monograph</option>
    				<option value="Technical Reports">Technical reports</option>
    				<option value="Others">Others</option>
  					</select>
					</div>
					<span id="book" class="text-danger"></span>

					<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label class="font-weight-bold">Department :</label>
                    <select class="form-control" id="sel2" name="department">
                     <option value=" ">Select Department</option>
                     <option value="Computer Science And Engineering">Computer Science And Engineering</option>
    				 <option value="Information Technology">Information Technology</option>
    				 <option value="Instrumentation Engineering">Instrumentation Engineering</option>
    				 <option value="Electronics And Telecommunication Engineering">Electronics And Telecommunication Engineering</option>
    				 <option value="Electrical Engineering">Electrical Engineering</option>
    				 <option value="Civil Engineering">Civil Engineering</option>
    				 <option value="Mechanical Engineering">Mechanical Engineering</option>
					 <option value="Applied Mechanics">Applied Mechanics</option>
    				 <option value="Applied Physics">Applied Physics</option>
    				 <option value="Applied Chemistry">Applied Chemistry</option>
					 <option value="Engineering mathematics">Engineering mathematics</option>
  					</select>
					</div>
					<span id="dept" class="text-danger"></span>
				</div>

				<div class="row">
					<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label class="font-weight-bold"> Author type ?  </label>
					<div class="radio">
                    <label><input type="radio" name="auth_type" value="Author"  >Author</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="auth_type" value="CoAuthor" >Co-Author</label>
                    </div>
				    </div>

				    <div>
				    	<label class="font-weight-bold"> Publication Date </label><br>
				    	<input type="date" name="pbl_date" id="publ_date">
				    </div>
				</div>

				<div class="row">					
					<div class="form-group col-lg-6 col-md-6 col-xs-6">
						<label class="font-weight-bold"> ISBN Number: </label>
						<input type="text" name="isbnnumber" class="form-control" id="isbn_no" autocomplete="off">
						<span id="isbn_number" class="text-danger"> </span>
					</div>

					<div class="form-group col-lg-6 col-md-6 col-xs-6">
						<label class="font-weight-bold"> Publisher's Name: </label>
						<input type="text" name="publishername" class="form-control" id="publ" autocomplete="off">
						<span id="publisher_name" class="text-danger"> </span>
					</div>
				</div>
				<div class="row">				
					
                	<div class="form-group col-lg-6 col-md-6 col-xs-6">
					<label class="font-weight-bold"> Number Of Pages: </label>
					<input type="text" name="pages_no" class="form-control col-lg-3 col-md-3 col-xs-3" id="nop" autocomplete="off">
					<span id="nops" class="text-danger"> </span>
					</div>
				</div>
				<center><input type="submit" name="submit" value="Save" class="btn btn-info" autocomplete="off"></center>
				<div style="padding-top: 40px;"></div>

			</form>
		</div>



<!--JAVASCRIPT-->
	<script type="text/javascript">
		

		function validation(){

			var b_title = document.getElementById('b_title').value;
			var publ = document.getElementById('publ').value;
			var nop = document.getElementById('nop').value;
			var publ_date = document.getElementById('publ_date').value;
			






			if(b_title == ""){
				document.getElementById('book_title').innerHTML =" **Please fill the Book Title field";
				return false;
			}


			if((athr_name.lenght <= 2) || (athr_name.length > 20)) {
				document.getElementById('author_name').innerHTML =" **Lenght must be between 2 and 20";
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




