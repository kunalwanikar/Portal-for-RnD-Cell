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

if(isset($_POST['allot'])){ 

$uid_am=$_POST['AM'];
$uid_ac=$_POST['AC'];
$uid_em=$_POST['EM'];
$uid_me=$_POST['ME'];
$uid_ee=$_POST['EE'];
$uid_entc=$_POST['ENTC'];
$uid_cse=$_POST['CSE'];
$uid_it=$_POST['IT'];
$uid_ie=$_POST['IE'];
$uid_ce=$_POST['CE'];
$uid_ap=$_POST['AP'];
    
    mysqli_query($conn, "UPDATE `new_registration` SET role='hod' WHERE UID = '".$uid_am."' ");
    mysqli_query($conn, "UPDATE `new_registration` SET role='hod' WHERE UID = '".$uid_ac."' ");
    mysqli_query($conn, "UPDATE `new_registration` SET role='hod' WHERE UID = '".$uid_em."' ");
    mysqli_query($conn, "UPDATE `new_registration` SET role='hod' WHERE UID = '".$uid_me."' ");
    mysqli_query($conn, "UPDATE `new_registration` SET role='hod' WHERE UID = '".$uid_ee."' ");
    mysqli_query($conn, "UPDATE `new_registration` SET role='hod' WHERE UID = '".$uid_entc."' ");
    mysqli_query($conn, "UPDATE `new_registration` SET role='hod' WHERE UID = '".$uid_it."' ");
    mysqli_query($conn, "UPDATE `new_registration` SET role='hod' WHERE UID = '".$uid_cse."' ");
    mysqli_query($conn, "UPDATE `new_registration` SET role='hod' WHERE UID = '".$uid_ie."' ");
    mysqli_query($conn, "UPDATE `new_registration` SET role='hod' WHERE UID = '".$uid_ce."' ");
    mysqli_query($conn, "UPDATE `new_registration` SET role='hod' WHERE UID = '".$uid_ap."' ");

    echo "<script>alert(\" New HODs are assigned successfully \");</script>";

}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Personal Information | Principal | R&D Department | Government College of Engineering, Amravati.</title>
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
<div class="col-lg-12 m-auto d-block">
<form action="" method="post" class="form-control" style="border: none;">

<h2 class="font-weight-bold text-center text-dark" style="text-shadow: 2px 2px 5px lightblue;padding-top: 10px;">Allot HOD</h2><br>
<h2> <label class="font-weight-bold"> Please select HOD of all Departments: </label> <h2>

<div class="form-group col-lg-8 col-md-8 col-xs-8">
                    <br><button class="btn btn-info" id="AC" name="ac" onclick='return false;'>Applied Chemistry</button><br>
                    <input type='radio' value='91036' name='AC'><strong> Hemlata Vishnupant Patile </strong><br/>
                    <input type='radio' value='96238' name='AC'><strong> Shamal Keshaorao Doifode </strong><br/>
                    <input type='radio' value='04697' name='AC'><strong> Vaishali Vijayrao Ardhapurkar </strong><br/>

                    <button class="btn btn-primary" id="AM" name="am" onclick='return false;'>Applied Mechanics</button><br>
                    <input type='radio' value='78312' name='AM'><strong> Ashish Ramdaspant Akhare </strong><br/>
                    <input type='radio' value='38270' name='AM'><strong> Dilip Janardhan Chaudhari </strong><br/>
                    <input type='radio' value='74528' name='AM'><strong> Lavkesh Rameshrao Wankhade </strong><br/>
                    <input type='radio' value='82453' name='AM'><strong> Pradip Shankarrao Lande </strong><br/>
                    <input type='radio' value='92307' name='AM'><strong> Shilpa Pandit Tak </strong><br/>
                    <input type='radio' value='68492' name='AM'><strong> Suchitra Kashinath Hirde </strong><br/>
                    <input type='radio' value='04591' name='AM'><strong> Suraj Narendra Khante </strong><br/>
                    <input type='radio' value='61547' name='AM'><strong> Sweety Diwakarrao Gowardhan </strong><br/>

                    <br><button class="btn btn-primary" id="AP" name="ap" onclick='return false;'>Applied Physics</button><br>
                    <input type='radio' value='49053' name='AP'><strong> Deepak Amrutrao Zatale </strong><br/>
                    <input type='radio' value='52748' name='AP'><strong> Shivprasad Vaijanathrao Shinde </strong><br/>

                    <br><button class="btn btn-info" id="EM" name="em" onclick='return false;'>Engineering Mathematics</button><br>
                    <input type='radio' value='83091' name='EM'><strong> Suresh Shripati Kumbhar </strong><br/>
                    <input type='radio' value='53076' name='EM'><strong> Swati Shrring Mathurkar </strong><br/>

                    <br><button class="btn btn-primary" id="CSE" name="cse" onclick='return false;'>Computer Science And Engineering</button><br>
                    <input type='radio' value='89204' name='CSE'><strong> Anil Vasantrao Deorankar </strong><br/>
                    <input type='radio' value='37521' name='CSE'><strong> Kamlesh A Waghmare </strong><br/>
                    <input type='radio' value='53619' name='CSE'><strong> Milind Babarao Waghmare </strong><br/>
                    <input type='radio' value='14209' name='CSE'><strong> Naresh Gajanan Gadage </strong><br/>
                    <input type='radio' value='26907' name='CSE'><strong> Prajakta Prakash Shelke </strong><br/>
                    <input type='radio' value='58673' name='CSE'><strong> Pravin Shridhar Revankar </strong><br/>
                    <input type='radio' value='69872' name='CSE'><strong> Pushpanjali Munnalal Chouragade </strong><br/>
                    <input type='radio' value='16389' name='CSE'><strong> Ravi Viswanath Mante </strong><br/>

                    <br><button class="btn btn-info" id="IT" name="it" onclick='return false;'>Information Technology</button><br>
                    <input type='radio' value='13568' name='IT'><strong> Archana Wamanrao Bhade </strong><br/>
                    <input type='radio' value='65302' name='IT'><strong> Archana Devidas Wankhade </strong><br/>
                    <input type='radio' value='87041' name='IT'><strong> Bhushan Vitthalrao Wakode </strong><br/>
                    <input type='radio' value='89150' name='IT'><strong> Dilip Ramkrishna Uike </strong><br/>
                    <input type='radio' value='61037' name='IT'><strong> Kishor Prakash Wagh </strong><br/>
                    <input type='radio' value='53087' name='IT'><strong> Kishor Narayan Tayade </strong><br/>
                    <input type='radio' value='16830' name='IT'><strong> Premchand Bhagwan Ambhore </strong><br/>
                    <input type='radio' value='73841' name='IT'><strong> Seema Rameshwarrao Wankhade </strong><br/>
                    <input type='radio' value='73501' name='IT'><strong> Shantanu Anandrao Lohi </strong><br/>

                    <br><button class="btn btn-primary" id="IE" name="ie" onclick='return false;'>Instrumentation Engineering</button><br>
                    <input type='radio' value='73210' name='IE'><strong> Nitin Suresh Pathak </strong><br/>
                    <input type='radio' value='60128' name='IE'><strong> Sheetal Pralhad Bijawe </strong><br/>
                    <input type='radio' value='96145' name='IE'><strong> Sonali Ashokrao Pande </strong><br/>
                    <input type='radio' value='64823' name='IE'><strong> Umesh Madhukarrao Thorkar </strong><br/>

                    <br><button class="btn btn-info" id="ME" name="me" onclick='return false;'>Mechanical Engineering</button><br>
                    <input type='radio' value='71904' name='ME'><strong> Ashish Manoharrao Mahalle </strong><br/>
                    <input type='radio' value='56419' name='ME'><strong> Ashok Gurumukhdas Mattani </strong><br/>
                    <input type='radio' value='63027' name='ME'><strong> Awani Balasaheb Londhe </strong><br/>
                    <input type='radio' value='05672' name='ME'><strong> Hemant Sahebrao Farkade </strong><br/>
                    <input type='radio' value='79541' name='ME'><strong> Mangesh Madhukar Deshmukh </strong><br/>
                    <input type='radio' value='91230' name='ME'><strong> Manish tejrao Shete </strong><br/>
                    <input type='radio' value='76534' name='ME'><strong> Manish Jagdishrao Deshmukh </strong><br/>
                    <input type='radio' value='74268' name='ME'><strong> Monika Shankarrao Satpute </strong><br/>
                    <input type='radio' value='98715' name='ME'><strong> Narendra Darshansing Solanke </strong><br/>
                    <input type='radio' value='82369' name='ME'><strong> Nilay Narayan Khobragade </strong><br/>
                    <input type='radio' value='01438' name='ME'><strong> Pramod Ramchandraji Pachghare </strong><br/>
                    <input type='radio' value='42007' name='ME'><strong> Rajendra Sevakram Dalu </strong><br/>
                    <input type='radio' value='89260' name='ME'><strong> Rajendra Hariram Sarada </strong><br/>
                    <input type='radio' value='26835' name='ME'><strong> Shailendra Manikrao Lawankar </strong><br/>
                    <input type='radio' value='14308' name='ME'><strong> Srikant Dinkarrao Londhe </strong><br/>
                    <input type='radio' value='01862' name='ME'><strong> Sunil Ramdas Kewate </strong><br/>

                    <br><button class="btn btn-primary" id="CE" name="ce" onclick='return false;'>Civil Engineering</button><br>
                    <input type='radio' value='10683' name='CE'><strong> Anant Ishwar Dhatrak </strong><br/>
                    <input type='radio' value='70346' name='CE'><strong> Arvind Madhusadhan Mokadam </strong><br/>
                    <input type='radio' value='89065' name='CE'><strong> Mangesh Laxmanrao Gulhane </strong><br/>
                    <input type='radio' value='73196' name='CE'><strong> Manoj N Hedau </strong><br/>
                    <input type='radio' value='02536' name='CE'><strong> Rampravesh Kapildeo Rai </strong><br/>
                    <input type='radio' value='82357' name='CE'><strong> Sandip Pandurang Tatewar </strong><br/>
                    <input type='radio' value='51627' name='CE'><strong> Taran Chudamanrao Bhagat </strong><br/>

                 <br><button class="btn btn-info" id="EE" name="ee" onclick='return false;'>Electrical Engineering</button><br>
                 <input type='radio' value='31865' name='EE'><strong> Anil Sadashivrao Shindekar </strong><br/>
                 <input type='radio' value='81603' name='EE'><strong> Kawita Devendrasingh Thakur </strong><br/>
                 <input type='radio' value='02675' name='EE'><strong> Manisha Vasant Jape </strong><br/>
                 <input type='radio' value='20859' name='EE'><strong> Nitin Jaykumar Phadkule </strong><br/>
                 <input type='radio' value='89625' name='EE'><strong> Piyush Pramod Gajbhiye </strong><br/>
                 <input type='radio' value='93502' name='EE'><strong> Rajani Maniramji Sahare </strong><br/>
                 <input type='radio' value='64201' name='EE'><strong> Rajesh Bhikulal Sharma </strong><br/>
                 <input type='radio' value='83075' name='EE'><strong> Ujwala Vikas Dongare </strong><br/>
                 <input type='radio' value='85640' name='EE'><strong> Vasant Manohar Jape </strong><br/>
                 <input type='radio' value='21305' name='EE'><strong> Vijay Mahadevrao Harane </strong><br/>
                 <input type='radio' value='24316' name='EE'><strong> Vilas Namdeorao Ghate </strong><br/>

                    <br><button class="btn btn-primary" id="ENTC" name="entc" onclick='return false;'>Electronics and Telecommunication Engineering</button><br>
                    <input type='radio' value='29467' name='ENTC'><strong> Dinesh Vithalrao Rojatkar  </strong><br/>
                    <input type='radio' value='90127' name='ENTC'><strong> Neha Gapatrao Pardesi  </strong><br/>
                    <input type='radio' value='27840' name='ENTC'><strong> Prashant Laxmanrao Pikrao  </strong><br/>
                    <input type='radio' value='72953' name='ENTC'><strong> Radhika Ramdas Harne  </strong><br/>
                    <input type='radio' value='38269' name='ENTC'><strong> Samrat Subhod Thorat  </strong><br/>
                    <input type='radio' value='62185' name='ENTC'><strong> Shubhada Sudhakar Thakare  </strong><br/>
                    <input type='radio' value='45372' name='ENTC'><strong> Shweta Jeewandas Meshram  </strong><br/>
                    <input type='radio' value='54702' name='ENTC'><strong> Snehal Samrat Thorat </strong><br/>

</div>

<center><input type="submit" name="allot" value="Allot" class="btn btn-primary"></center>

</div>

</form>
</div>
</body>
</html>