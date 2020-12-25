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

    $uid=$_POST['AM'];
    $sql = "SELECT * FROM p_info where UID = '".$uid."' ";
$result = $conn->query($sql);

while($rowval = $result->fetch_assoc()) {
$firstname= $rowval['Firstname'];
$lastname= $rowval['Lastname'];
$name_user = $firstname.' '.$lastname;
};
    
    mysqli_query($conn, "UPDATE `new_registration` SET role='dean' WHERE UID = '".$uid."' ");
    echo "<script>alert(\" New dean for Research and Development cell, GCOEA is $name_user \");</script>";

}

error_reporting(0);
$conn->close();

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
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" class="form-control" onsubmit="return validation()" style="border: none;">

<h2 class="font-weight-bold text-center text-dark" style="text-shadow: 2px 2px 5px lightblue;padding-top: 10px;">Allot Dean</h2><br>
<h2> <label class="font-weight-bold"> Please select new DEAN for Research and development cell: </label> <h2>

<div class="form-group col-lg-8 col-md-8 col-xs-8">
                    <br><button class="btn btn-info" id="AC" name="ac" onclick='return false;'>Applied Chemistry</button><br>
                    <input type='radio' value='91036' name='AM'><strong> Hemlata Vishnupant Patile </strong><br/>
                    <input type='radio' value='96238' name='AM'><strong> Shamal Keshaorao Doifode </strong><br/>
                    <input type='radio' value='04697' name='AM'><strong> Vaishali Vijayrao Ardhapurkar </strong><br/>

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
                    <input type='radio' value='49053' name='AM'><strong> Deepak Amrutrao Zatale </strong><br/>
                    <input type='radio' value='52748' name='AM'><strong> Shivprasad Vaijanathrao Shinde </strong><br/>

                    <br><button class="btn btn-info" id="EM" name="em" onclick='return false;'>Engineering Mathematics</button><br>
                    <input type='radio' value='83091' name='AM'><strong> Suresh Shripati Kumbhar </strong><br/>
                    <input type='radio' value='53076' name='AM'><strong> Swati Shrring Mathurkar </strong><br/>

                    <br><button class="btn btn-primary" id="CSE" name="cse" onclick='return false;'>Computer Science And Engineering</button><br>
                    <input type='radio' value='89204' name='AM'><strong> Anil Vasantrao Deorankar </strong><br/>
                    <input type='radio' value='37521' name='AM'><strong> Kamlesh A Waghmare </strong><br/>
                    <input type='radio' value='53619' name='AM'><strong> Milind Babarao Waghmare </strong><br/>
                    <input type='radio' value='14209' name='AM'><strong> Naresh Gajanan Gadage </strong><br/>
                    <input type='radio' value='26907' name='AM'><strong> Prajakta Prakash Shelke </strong><br/>
                    <input type='radio' value='58673' name='AM'><strong> Pravin Shridhar Revankar </strong><br/>
                    <input type='radio' value='69872' name='AM'><strong> Pushpanjali Munnalal Chouragade </strong><br/>
                    <input type='radio' value='16389' name='AM'><strong> Ravi Viswanath Mante </strong><br/>

                    <br><button class="btn btn-info" id="IT" name="it" onclick='return false;'>Information Technology</button><br>
                    <input type='radio' value='13568' name='AM'><strong> Archana Wamanrao Bhade </strong><br/>
                    <input type='radio' value='65302' name='AM'><strong> Archana Devidas Wankhade </strong><br/>
                    <input type='radio' value='87041' name='AM'><strong> Bhushan Vitthalrao Wakode </strong><br/>
                    <input type='radio' value='89150' name='AM'><strong> Dilip Ramkrishna Uike </strong><br/>
                    <input type='radio' value='61037' name='AM'><strong> Kishor Prakash Wagh </strong><br/>
                    <input type='radio' value='53087' name='AM'><strong> Kishor Narayan Tayade </strong><br/>
                    <input type='radio' value='16830' name='AM'><strong> Premchand Bhagwan Ambhore </strong><br/>
                    <input type='radio' value='73841' name='AM'><strong> Seema Rameshwarrao Wankhade </strong><br/>
                    <input type='radio' value='73501' name='AM'><strong> Shantanu Anandrao Lohi </strong><br/>

                    <br><button class="btn btn-primary" id="IE" name="ie" onclick='return false;'>Instrumentation Engineering</button><br>
                    <input type='radio' value='73210' name='AM'><strong> Nitin Suresh Pathak </strong><br/>
                    <input type='radio' value='60128' name='AM'><strong> Sheetal Pralhad Bijawe </strong><br/>
                    <input type='radio' value='96145' name='AM'><strong> Sonali Ashokrao Pande </strong><br/>
                    <input type='radio' value='64823' name='AM'><strong> Umesh Madhukarrao Thorkar </strong><br/>

                    <br><button class="btn btn-info" id="ME" name="me" onclick='return false;'>Mechanical Engineering</button><br>
                    <input type='radio' value='71904' name='AM'><strong> Ashish Manoharrao Mahalle </strong><br/>
                    <input type='radio' value='56419' name='AM'><strong> Ashok Gurumukhdas Mattani </strong><br/>
                    <input type='radio' value='63027' name='AM'><strong> Awani Balasaheb Londhe </strong><br/>
                    <input type='radio' value='05672' name='AM'><strong> Hemant Sahebrao Farkade </strong><br/>
                    <input type='radio' value='79541' name='AM'><strong> Mangesh Madhukar Deshmukh </strong><br/>
                    <input type='radio' value='91230' name='AM'><strong> Manish tejrao Shete </strong><br/>
                    <input type='radio' value='76534' name='AM'><strong> Manish Jagdishrao Deshmukh </strong><br/>
                    <input type='radio' value='74268' name='AM'><strong> Monika Shankarrao Satpute </strong><br/>
                    <input type='radio' value='98715' name='AM'><strong> Narendra Darshansing Solanke </strong><br/>
                    <input type='radio' value='82369' name='AM'><strong> Nilay Narayan Khobragade </strong><br/>
                    <input type='radio' value='01438' name='AM'><strong> Pramod Ramchandraji Pachghare </strong><br/>
                    <input type='radio' value='42007' name='AM'><strong> Rajendra Sevakram Dalu </strong><br/>
                    <input type='radio' value='89260' name='AM'><strong> Rajendra Hariram Sarada </strong><br/>
                    <input type='radio' value='26835' name='AM'><strong> Shailendra Manikrao Lawankar </strong><br/>
                    <input type='radio' value='14308' name='AM'><strong> Srikant Dinkarrao Londhe </strong><br/>
                    <input type='radio' value='01862' name='AM'><strong> Sunil Ramdas Kewate </strong><br/>

                    <br><button class="btn btn-primary" id="CE" name="ce" onclick='return false;'>Civil Engineering</button><br>
                    <input type='radio' value='10683' name='AM'><strong> Anant Ishwar Dhatrak </strong><br/>
                    <input type='radio' value='70346' name='AM'><strong> Arvind Madhusadhan Mokadam </strong><br/>
                    <input type='radio' value='89065' name='AM'><strong> Mangesh Laxmanrao Gulhane </strong><br/>
                    <input type='radio' value='73196' name='AM'><strong> Manoj N Hedau </strong><br/>
                    <input type='radio' value='02536' name='AM'><strong> Rampravesh Kapildeo Rai </strong><br/>
                    <input type='radio' value='82357' name='AM'><strong> Sandip Pandurang Tatewar </strong><br/>
                    <input type='radio' value='51627' name='AM'><strong> Taran Chudamanrao Bhagat </strong><br/>

                 <br><button class="btn btn-info" id="EE" name="ee" onclick='return false;'>Electrical Engineering</button><br>
                 <input type='radio' value='31865' name='AM'><strong> Anil Sadashivrao Shindekar </strong><br/>
                 <input type='radio' value='81603' name='AM'><strong> Kawita Devendrasingh Thakur </strong><br/>
                 <input type='radio' value='02675' name='AM'><strong> Manisha Vasant Jape </strong><br/>
                 <input type='radio' value='20859' name='AM'><strong> Nitin Jaykumar Phadkule </strong><br/>
                 <input type='radio' value='89625' name='AM'><strong> Piyush Pramod Gajbhiye </strong><br/>
                 <input type='radio' value='93502' name='AM'><strong> Rajani Maniramji Sahare </strong><br/>
                 <input type='radio' value='64201' name='AM'><strong> Rajesh Bhikulal Sharma </strong><br/>
                 <input type='radio' value='83075' name='AM'><strong> Ujwala Vikas Dongare </strong><br/>
                 <input type='radio' value='85640' name='AM'><strong> Vasant Manohar Jape </strong><br/>
                 <input type='radio' value='21305' name='AM'><strong> Vijay Mahadevrao Harane </strong><br/>
                 <input type='radio' value='24316' name='AM'><strong> Vilas Namdeorao Ghate </strong><br/>

                    <br><button class="btn btn-primary" id="ENTC" name="entc" onclick='return false;'>Electronics and Telecommunication Engineering</button><br>
                    <input type='radio' value='29467' name='AM'><strong> Dinesh Vithalrao Rojatkar  </strong><br/>
                    <input type='radio' value='90127' name='AM'><strong> Neha Gapatrao Pardesi  </strong><br/>
                    <input type='radio' value='27840' name='AM'><strong> Prashant Laxmanrao Pikrao  </strong><br/>
                    <input type='radio' value='72953' name='AM'><strong> Radhika Ramdas Harne  </strong><br/>
                    <input type='radio' value='38269' name='AM'><strong> Samrat Subhod Thorat  </strong><br/>
                    <input type='radio' value='62185' name='AM'><strong> Shubhada Sudhakar Thakare  </strong><br/>
                    <input type='radio' value='45372' name='AM'><strong> Shweta Jeewandas Meshram  </strong><br/>
                    <input type='radio' value='54702' name='AM'><strong> Snehal Samrat Thorat </strong><br/>

</div>

<center><input type="submit" name="allot" value="Allot" class="btn btn-primary"></center>

</div>

</form>
</div>
</body>
</html>