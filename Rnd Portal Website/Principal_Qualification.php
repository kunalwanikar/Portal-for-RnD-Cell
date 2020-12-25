<?php 
session_start();
include('scriptfo1.js');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "r&d";
$uid= $_SESSION['uid'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


if(isset($_POST['submit'])){
    $chars = "0123456789abcdefghijklmnopqrstuvwxyz";
    $qualificationid = substr( str_shuffle( $chars ), 0, 7 );
    $Degree_level=$_POST['gdlevel'];
    $Degree_name=$_POST['gdname'];
    $College_name=$_POST['gcname'];
    $University=$_POST['guname'];
    $Year_of_passing=$_POST['gyop'];
    $Percentage=$_POST['gperc'];
    $Discipline=$_POST['Department'];
    $passing_division=$_POST['gpasdi'];
    $Upload_degree=$_POST['gupdeg'];
    $status=$_POST['stats']; 

    $query_dupl = mysqli_query($conn, "SELECT * FROM qualification_details WHERE qualificationID='$qualificationid' ");

            if(mysqli_num_rows($query_dupl) > 0 ) {
                echo"<br>";
                echo "<font color=red size=4 >";
                echo"<center><b>";
                echo "Sorry fo the inconvenience, Please try again!";
                echo"</b></center>";
            }
            else{                                                                                                              
    
                    $allowed = mysqli_query($conn,"INSERT INTO qualification_details (Degree_level, Degree_name, College_name, University, Year_of_passing, Percentage, Discipline, passing_division, Upload_degree, status, qualificationID, UID)
                    VALUES ('$Degree_level','$Degree_name','$College_name','$University','$Year_of_passing','$Percentage','$Discipline','$passing_division','$Upload_degree','$status', '$qualificationid', '$uid') ");

                    echo "Data Saved!";
}
}

$conn->close();



?>

<!DOCTYPE html>
<html>
<head>
    <title>Qualification | Principal | R&D Department | Government College of Engineering, Amravati.</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.6.0/css/mdb.min.css" rel="stylesheet">
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.6.0/js/mdb.min.js"></script>


</head>
<body>  
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" class="form-control z-depth-4" onsubmit="return validation()">
                <div style="padding-top: 30px;"></div>
                
                
                <div class="row">
                    <div class="form-group col-lg-6 col-md-6 col-xs-6">
                    <label for="graduationuniversity" class="font-weight-bold"> Degree Name: </label>
                    <input type="text" name="gdname" class="form-control" id="g_dname" autocomplete="off">
                    <span id="dname_span" class="text-danger"> </span>
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-xs-6">
                    <label for="graduationcollege" class="font-weight-bold"> Degree level: </label>
                    <input type="text" name="gdlevel" class="form-control" id="g_dlevel" autocomplete="off">
                    <span id="dlevel_span" class="text-danger"> </span>
                    </div>
                </div>

                <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-xs-6">
                    <label for="graduationdegree" class="font-weight-bold">College Name: </label>
                    <input type="text" name="gcname" class="form-control" id="g_cname" autocomplete="off">
                    <span id="cname_span" class="text-danger"> </span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-xs-6">
                    <label for="graduationdegree" class="font-weight-bold"> University Name: </label>
                    <input type="text" name="guname" class="form-control" id="g_uname" autocomplete="off">
                    <span id="uname_span" class="text-danger"> </span>
                </div>
                </div>

                <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-xs-6">
                    <label class="font-weight-bold">Discipline :</label>
                    <select class="form-control" id="sel4" name="Department">
                    <option value="Computer Science And Engineering">Computer Science And Engineering</option>
                    <option value="Information Technology">Information Technology</option>
                    <option value="Instrumentation Engineering">Instrumentation Engineering</option>
                    <option value="Electronics And Telecommunication Technology">Electronics And Telecommunication Engineering</option>
                    <option value="Electrical Engineering">Electrical Engineering</option>
                    <option value="Civil Engineering">Civil Engineering</option>
                    <option value="Mechanical Engineering">Mechanical Engineering</option>
                    </select>
                </div>
                    <span id="sel4_span" class="text-danger"> </span>
                <div class="form-group col-lg-6 col-md-6 col-xs-6">
                    <label for="graduationdegree" class="font-weight-bold"> Upload Degree: </label>
                    <input type="file" name="gupdeg" class="form-control" id="g_updeg" autocomplete="off">
                    <span id="updeg_span" class="text-danger"> </span>
                </div>               
                </div>

                <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-xs-6">
                    <label for="graduationdegree" class="font-weight-bold"> Year of Passing: </label>
                    <input type="text" name="gyop" class="form-control" id="g_yop" autocomplete="off">
                    <span id="yop_span" class="text-danger"> </span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-xs-6">
                    <label for="graduationdegree" class="font-weight-bold"> Percentage/CGPA: </label>
                    <input type="text" name="gperc" class="form-control" id="g_perc" autocomplete="off">
                    <span id="perc_span" class="text-danger"> </span>
                </div>
                </div>

                <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-xs-6">
                    <label for="graduationdegree" class="font-weight-bold"> Passing Division: </label>
                    <input type="text" name="gpasdi" class="form-control" id="g_pasdi" autocomplete="off">
                    <span id="pasdi_span" class="text-danger"> </span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-xs-6">
                    <label class="font-weight-bold">Status :</label>
                    <select class="form-control" id="sel3" name="stats">
                    <option value="Pursuing">Pursuing</option>
                    <option value="Completed">Completed</option>
                    </select>
                </div>
                    <span id="sel3_span" class="text-danger"> </span>
                
                </div>
                <center><input type="submit" name="submit" value="Save" class="btn bg-info" autocomplete="off" ></center>
                <div style="padding-top: 20px;"></div>     
            
            </form>
        </div>
</body>

<!--JAVASCRIPT-->
    <script type="text/javascript">
        

        function validation(){

            var g_degname = document.getElementById('g_dname').value;
            var g_deglevel = document.getElementById('g_dlevel').value;
            var g_clgname = document.getElementById('g_degree').value;
            var g_univname = document.getElementById('g_uname').value;
            var g_disci = document.getElementById('sel4').value;
            var g_yeop = document.getElementById('g_yop').value;
            var g_perce = document.getElementById('g_perc').value;
            var g_pasdiv = document.getElementById('g_pasdi').value;
			var g_upldeg = document.getElementById('g_updeg').value;
			var g_sel3 = document.getElementById('sel3').value;
            
            if(g_degname == ""){
                document.getElementById('dname_span').innerHTML =" **Please fill the Degree Name field";
                return false;
            }
            if(g_deglevel == ""){
                document.getElementById('dlevel_span').innerHTML =" **Please fill the Degree Level field";
                return false;
            }


            if(g_clgname == ""){
                document.getElementById('cname_span').innerHTML =" **Please fill the College name field";
                return false;
            }
            if(g_univname == ""){
                document.getElementById('uname_span').innerHTML =" **Please fill the University Name field";
                return false;
            }


            if(g_disci == ""){
                document.getElementById('sel4_span').innerHTML =" **Please select discipline or Branch";
                return false;
            }
            if(g_yeop == ""){
                document.getElementById('yop_span').innerHTML =" **Enter Valid Year";
                return false;
            }


            if(g_perce == ""){
                document.getElementById('perc_span').innerHTML =" **Only two digits after decimal are allowed";
                return false;
            }
            if(g_pasdiv == ""){
                document.getElementById('pasdi_span').innerHTML =" **";
                return false;
            }


            if(g_upldeg == ""){
                document.getElementById('updeg_span').innerHTML =" **Please upload appropriate file";
                return false;
            }
            
            if(g_sel3 == ""){
                document.getElementById('sel3_span').innerHTML =" **choose none if not applied for Phd";
                return false;
            }
            
            
        }

    </script>
<!--JAVASCRIPT-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>