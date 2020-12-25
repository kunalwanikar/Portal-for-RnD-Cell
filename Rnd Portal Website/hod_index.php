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

$userprofile = $_SESSION['user'];
$query = "SELECT * FROM new_registration WHERE Username = '$userprofile'";
$data = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($data);
$_SESSION['uid'] = $result['UID'];

$sql = "SELECT * FROM p_info where UID = '".$_SESSION['uid']."' ";
                                   

$result = $conn->query($sql);

while($rowval = $result->fetch_assoc()) {
$photo= $rowval['Upload_photo'];
$firstname= $rowval['Firstname'];
$lastname= $rowval['Lastname'];
$name_user = $firstname.' '.$lastname;
};

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="stylesheet" href="style.css" >
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
</head>

<body>

<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="#">GCOEA Research And Development</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">
          <img class="img-responsive img-rounded" src="data:image/jpeg;base64,<?php echo base64_encode( $photo ); ?>"
            alt="User picture">
        </div>
        <div class="user-info">
          <span class="user-name"><?php echo $name_user; ?>
          </span>
          <span class="user-role">Administrator</span>
          <span class="user-status">
          </span>
        </div>
      </div>
      <!-- sidebar-header  -->
     
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>Entitlement</span>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-shopping-cart"></i>
              <span>Publications</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#bok" aria-controls="bok" role="tab" data-togle="tab" id="bok">Books </a>
                </li>
                <li>
                  <a href="#jor" aria-controls="jor" role="tab" data-togle="tab" id="jor">Journals</a>
                </li>
                <li>
                  <a href="#pat" aria-controls="pat" role="tab" data-togle="tab" id="pat">Patents</a>
                </li>
                <li>
                  <a href="#conf" aria-controls="conf" role="tab" data-togle="tab" id="conf">Conferences</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="far fa-gem"></i>
              <span>Trainings</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#tr" aria-controls="tr" role="tab" data-togle="tab" id="tr">Trainings </a>
                </li>
                <li>
                  <a href="#tr1" aria-controls="tr1" role="tab" data-togle="tab" id="tr1">Teaching Experience </a>
                </li>
                <li>
                  <a href="#tr2" aria-controls="tr2" role="tab" data-togle="tab" id="tr2">Industrial Experience </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-chart-line"></i>
              <span>Other Activities</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#adm" aria-controls="adm" role="tab" data-togle="tab" id="adm">Administrative Works</a>
                </li>
                <li>
                  <a href="#ext" aria-controls="ext" role="tab" data-togle="tab" id="ext">Extra Curricular Activities </a>
                </li> 
              </ul>
            </div>
          </li>
          <li class="header-menu">
            <span>Extra</span>
          </li>
          <li>
            <a href="#reports" aria-controls="reports" role="tab" data-togle="tab" id="reports">
              <i class="fa fa-book" aria-controls="true"></i>
              <span>Report</span></a>
          </li>
          <li>
            <a href="#passchange" aria-controls="passchange" role="tab" data-togle="tab" id="passchange">
              <i class="fa fa-calendar"></i>
              <span>Change Password</span>
            </a>
          </li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
      <a href="logout.php">
        <span>LOGOUT</span>
        <i class="fa fa-power-off"></i>
      </a>
    </div>
  </nav>
  <!-- sidebar-wrapper  -->

  <main class="page-content">
    <div class="container-fluid">
      
     <!-- tabs content -->
     <section class="design-process-section" id="process-tab">
            
                <div class="row">
                <div class="col-xs-12"> 
                    <!-- design process steps--> 
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs process-model more-icon-preocess" role="tablist">
                    <li role="presentation" class="active"><a href="#personal_info" aria-controls="personal_info" role="tab" data-toggle="tab" id="personal_info"><i class="fas fa-user" aria-hidden="true"></i>
                        <p>My Profile</p>
                        </a></li>
                    <li role="presentation"><a href="#qualification" aria-controls="qualification" role="tab" data-toggle="tab" id="qualification"><i class="fas fa-user-graduate" aria-hidden="true"></i>
                        <p>Qualification</p>
                        </a></li>
                    <li role="presentation"><a href="#publication" aria-controls="publication" role="tab" data-toggle="tab" id="publication"><i class="fas fa-journal-whills" aria-hidden="true"></i>
                        <p>Publications</p>
                        </a></li>
                    <li role="presentation"><a href="#training" aria-controls="training" role="tab" data-toggle="tab"  id="training"><i class="fas fa-tools" aria-hidden="true"></i>
                        <p>Experience</p>
                        </a></li>
                    <li role="presentation"><a href="#workshop" aria-controls="workshop" role="tab" data-toggle="tab"  id="workshop"><i class="fas fa-tools" aria-hidden="true"></i>
                        <p>Other Activities</p>
                        </a></li>
                         <li role="presentation"><a href="#inst" aria-controls="inst" role="tab" data-toggle="tab"  id="inst"><i class="fas fa-journal-whills" aria-hidden="true"></i>
                        <p>Organized Programs</p>
                        </a></li>
                    </ul>
                    <!-- end design process steps--> 
                    <!-- Tab panes -->
                    <center>
                    <div class="tab-content align-items-center">
                    <iframe src="principal_personalinfo.php" id="frame" width="100%" height="500px"  scrolling="yes">

                    <div role="tabpanel" class="tab-pane active" >
                        <div class="design-process-content">
                        <?php include('principal_personalinfo.php'); ?>
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane" >
                        <div class="design-process-content" >
                        <?php include('qual.php'); ?>
                        </div>
                    </div>
                    
                    <div role="tabpanel" class="tab-pane" >
                        <div class="design-process-content">
                        <?php include('publication.php'); ?>
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane">
                        <div class="design-process-content">
                        <?php include('conf.php'); ?>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane">
                        <div class="design-process-content">
                        <?php include('training.php'); ?>
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane">
                        <div class="design-process-content">
                        <?php include('workshops.php'); ?>
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane active" >
                        <div class="design-process-content">
                        <?php include('new_registration.php'); ?>
                        </div>
                    </div>
                     <div role="tabpanel" class="tab-pane active" >
                        <div class="design-process-content">
                        <?php include('passchange.php'); ?>
                        </div>
                    </div>
                     <div role="tabpanel" class="tab-pane active" >
                        <div class="design-process-content">
                        <?php include('allotdean.php'); ?>
                        </div>
                    </div>
                     <div role="tabpanel" class="tab-pane active" >
                        <div class="design-process-content">
                        <?php include('allothod.php'); ?>
                        </div>
                    </div>
                </div>
        </iframe>
            </div>
          </center>
            </section>
<!-- tab content ends -->
<script src="configuration/script.js"></script>
<script>
$(function(){
  $("#personal_info").click(function () { 
    $("#frame").attr("src", "principal_personalinfo.php");
  });
  $("#qualification").click(function () { 
    $("#frame").attr("src", "qualtab.php");
  });
 
  $("#publication").click(function () { 
    $("#frame").attr("src", "pubtab.php");
  });
  $("#conferences").click(function () { 
    $("#frame").attr("src", "conf.php");
  });
  $("#training").click(function () { 
    $("#frame").attr("src", "exptratab.php");
  });
  $("#new_registration").click(function () { 
    $("#frame").attr("src", "new_registration.php");
  });
  $("#passchange").click(function () { 
    $("#frame").attr("src", "passchange.php");
  });
  $("#allotdean").click(function () { 
    $("#frame").attr("src", "allotdean.php");
  });
  $("#allothod").click(function () { 
    $("#frame").attr("src", "allothod.php");
  });
  $("#inactive_account").click(function () { 
    $("#frame").attr("src", "inactive_account.php");
  });
  $("#workshop").click(function () { 
    $("#frame").attr("src", "activtab.php");
  });
  $("#reports").click(function () { 
    $("#frame").attr("src", "form1.php");
  });
  $("#bok").click(function () { 
    $("#frame").attr("src", "pubtab.php#pills-books");
  });
  $("#jor").click(function () { 
    $("#frame").attr("src", "pubtab.php#pills-journal");
  });
  $("#pat").click(function () { 
    $("#frame").attr("src", "pubtab.php#pills-patents");
  });
   $("#conf").click(function () { 
    $("#frame").attr("src", "pubtab.php#pills-conf");
  });
   $("#tr").click(function () { 
    $("#frame").attr("src", "pubtab.php#pills-tra");
  });
   $("#tr1").click(function () { 
    $("#frame").attr("src", "exptratab.php");
  });
   $("#tr2").click(function () { 
    $("#frame").attr("src", "exptratab.php");
  });
   $("#adm").click(function () { 
    $("#frame").attr("src", "activtab.php");
  });
   $("#ext").click(function () { 
    $("#frame").attr("src", "activtab.php#pills-ind");
  });
  $("#inst").click(function () { 
    $("#frame").attr("src", "insttab.php");
  });
});
</script>
    
  </div>
  </main>

 

<!-- page-content" -->
</div>
<!-- page-wrapper -->

<footer>
  <?php include('footer.php'); ?>
 </footer>

</body>


<html>