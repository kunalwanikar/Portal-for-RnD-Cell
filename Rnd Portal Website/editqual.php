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

$userprofile= $_SESSION['user'];
$query = "SELECT * FROM new_registration WHERE Username = '$userprofile'";
$data = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($data);
$_SESSION['uid'] = $result['UID'];

$sql = "SELECT * FROM qualification_details where UID = '.$_SESSION['uid'].' AND Year_of_passing = '$_GET[id]'";

$res = $conn->query($sql);

while($rowval = $res->fetch_assoc()) {

$Degree_level= $rowval['Degree_level'];
$Degree_name= $rowval['Degree_name'];
$College_name= $rowval['College_name'];
$University= $rowval['University'];
$Year_of_passing= $rowval['Year_of_passing'];
$Percentage= $rowval['Percentage'];
$Discipline= $rowval['Discipline'];
$passing_division= $rowval['passing_division'];
$Upload_degree= $rowval['Upload_degree'];

};

  if(isset($_POST['update'])){
  $Degree_level=$_POST['gdlevel'];
  $Degree_name=$_POST['gdname'];
  $College_name=$_POST['gcname'];
  $University=$_POST['guname'];
  $Year_of_passing=$_POST['gyop'];
  $Percentage=$_POST['g_perc'];
  $Discipline=$_POST['Department'];
  $passing_division=$_POST['g_pasdi'];
  $Upload_degree=$_POST['gupdeg'];
  $UID=$_SESSION['uid'];                                                                                                               
    
                                                                                                                                                                                    
                    $allowed = mysqli_query($conn,"UPDATE qualification_details SET `Degree_level`='$Degree_level',`Degree_name`='$Degree_name',`College_name`='$College_name',`University`='$University',`Year_of_passing`='$Year_of_passing',`Percentage`='$Percentage',`Discipline`='$Discipline',`passing_division`='$passing_division',`Upload_degree`='$Upload_degree','UID'='$UID'");
}
$conn->close();


   
?>



<!-- pending status column linkinage to db-->


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
    <div class="container"style="padding-bottom: 30px;padding-top: 30px">
        
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" class="form-control z-depth-4" onsubmit="return validation()">
                <div style="padding-top: 30px;"></div>
                
                
                <div class="row">
                    <div class="form-group col-lg-6 col-md-6 col-xs-6">
                    <label for="graduationuniversity" class="font-weight-bold"> Degree Name: </label>
                    <input type="text" name="gdname" class="form-control" id="g_dname" autocomplete="off" value='<?php echo $Degree_name; ?>' >
                     <span id="dname_span" class="text-danger"> </span>
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-xs-6">
                    <label for="graduationcollege" class="font-weight-bold"> Degree level: </label>
                    <input type="text" name="gdlevel" class="form-control" id="g_dlevel" autocomplete="off" value='<?php echo $Degree_level; ?>' >
                    <span id="dlevel_span" class="text-danger"> </span>
                    </div>
                </div>

                <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-xs-6">
                    <label for="graduationdegree" class="font-weight-bold">College Name: </label>
                    <input type="text" name="gcname" class="form-control" id="g_cname" autocomplete="off" value='<?php echo $College_name; ?>' >
                    <span id="cname_span" class="text-danger"> </span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-xs-6">
                    <label for="graduationdegree" class="font-weight-bold"> University Name: </label>
                    <input type="text" name="guname" class="form-control" id="g_uname" autocomplete="off" value='<?php echo $University; ?>' >
                    <span id="uname_span" class="text-danger"> </span>
                </div>
                </div>
                <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-xs-6">
                    <label class="font-weight-bold">Discipline :</label>
                    <select class="form-control" id="sel4" name="Department">
                    <option value="Computer Science And Engineering" <?php if($Discipline=="Computer Science And Engineering"){?> selected <?php } ?> >Computer Science And Engineering</option>
                    <option value="Information Technology" <?php if($Discipline=="Information Technology"){?> selected <?php } ?> >Information Technology</option>
                    <option value="Instrumentation Engineering" <?php if($Discipline=="Instrumentation Engineering"){?> selected <?php } ?> >Instrumentation Engineering</option>
                    <option value="Electronics And Telecommunication Technology" <?php if($Discipline=="Electronics And Telecommunication Technology"){?> selected <?php } ?> >Electronics And Telecommunication Engineering</option>
                    <option value="Electrical Engineering" <?php if($Discipline=="Electrical Engineering"){?> selected <?php } ?> >Electrical Engineering</option>
                    <option value="Civil Engineering" <?php if($Discipline=="Civil Engineering"){?> selected <?php } ?> >Civil Engineering</option>
                    <option value="Mechanical Engineering" <?php if($Discipline=="Mechanical Engineering"){?> selected <?php } ?> >Mechanical Engineering</option>
                    </select>
                </div>
                    <span id="sel4_span" class="text-danger"> </span>
                <div class="form-group col-lg-6 col-md-6 col-xs-6">
                    <label for="graduationdegree" class="font-weight-bold"> Upload Degree: </label>
                    <input type="text" name="gupdeg" class="form-control" id="g_updeg" autocomplete="off"  value='<?php echo $Upload_degree; ?>' >
                    <span id="updeg_span" class="text-danger"> </span>
                </div>
                
                </div>

                <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-xs-6">
                    <label for="graduationdegree" class="font-weight-bold"> Year of Passing: </label>
                    <input type="text" name="gyop" class="form-control" id="g_yop" autocomplete="off" value='<?php echo $Year_of_passing; ?>' >
                    <span id="yop_span" class="text-danger"> </span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-xs-6">
                    <label for="graduationdegree" class="font-weight-bold"> Percentage/CGPA: </label>
                    <input type="text" name="gperc" class="form-control" id="g_perc" autocomplete="off" value='<?php echo $Percentage; ?>' >
                    <span id="perc_span" class="text-danger"> </span>
                </div>
                </div>
                <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-xs-6">
                    <label for="graduationdegree" class="font-weight-bold"> Passing Division: </label>
                    <input type="text" name="gpasdi" class="form-control" id="g_pasdi" autocomplete="off" value='<?php echo $passing_division; ?>' >
                    <span id="pasdi_span" class="text-danger"> </span>
                </div>

                <div class="form-group col-lg-6 col-md-6 col-xs-6">
                    <label class="font-weight-bold">Phd :</label>
                    <select class="form-control" id="sel3" name="Department">
                    <option value="Pursuing" <?php if($status=="Pursuing"){?> selected <?php } ?> >Pursuing</option>
                    <option value="Completed" <?php if($status=="Completed"){?> selected <?php } ?> >Completed</option>
                    <option value="None" <?php if($status=="None"){?> selected <?php } ?> >None</option>
                    </select>
                </div>
                    <span id="sel3_span" class="text-danger"> </span>  
                </div>
                <center><input type="submit" name="update" value="update" class="btn bg-info" autocomplete="off"></center>
                <div style="padding-top: 20px;"></div>
               
                

            
            </form>
        </div>
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