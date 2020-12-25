<?php

//session_start();
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
//$userprofile= $_SESSION['user'];
//$query = "SELECT * FROM new_registration WHERE Username = '$userprofile'";
//$data = mysqli_query($conn,$query);
//$result = mysqli_fetch_assoc($data);
//$_SESSION['uid'] = $result['UID'];

include('date.php');

$teach = $_COOKIE['teachers'];
$teach = stripslashes($teach);    // string is stored with escape double quotes 
$teach = json_decode($teach, true);

$dfrom = $_COOKIE['datefrom'];
$dto = $_COOKIE['dateto'];
$tbl = $_COOKIE['tblname'];

if(isset($_POST['submit1'])){
    
if(!empty($_POST['col'])) {
   
    $arr1 = array();
    array_push($arr1,'Firstname');
   array_push($arr1, 'Middlename');
    array_push($arr1, 'Lastname');
foreach ($_POST['col'] as $c) {
        if($c != NULL){
            array_push($arr1, $c);
        }
        }


        $count = count($arr1);
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "r&d";
        $conn = new mysqli($servername, $username, $password, $dbname);  

    header('Content-Type: text-csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');
    $output = fopen("php://output", "w");
    fputcsv($output, $arr1);
    $date2 = getDate1($tbl);
    $qurystr = $arr1[0];
    //$teacher = $teach[0];
    
    for($f = 1 ; $f < sizeof($arr1); $f++){
        $qurystr =  $qurystr.",".$arr1[$f] ;
    }
    /*for($e = 1 ; $e < sizeof($teach); $e++){
        $teacher =  $teacher.",".$teach[$e] ;
    }*/
    //$query="SELECT $qurystr FROM new_registration,$tbl WHERE new_registration.UID IN (". implode(',', $teach) .") ";
    //$query="SELECT $qurystr FROM new_registration,$tbl WHERE($tbl.$date2 BETWEEN $dfrom AND $dto) AND ($tbl.UID IN (". implode(',', $teach) .") )";
   // $query="SELECT $qurystr FROM new_registration a, $tbl d WHERE (a.UID = d.UID) AND (d.$date2 between $dfrom AND $dto) AND(a.UID IN (". implode(',', $teach) .") )";
    //$query="SELECT $qurystr FROM new_registration a WHERE a.UID IN (SELECT UID FROM $tbl WHERE $date2 BETWEEN $dfrom AND $dto)  AND (a.UID IN (". implode(',', $teach) .") )";
   $query = "SELECT $qurystr FROM new_registration, $tbl WHERE (new_registration.UID = $tbl.UID) AND (new_registration.UID IN (". implode(',', $teach) .")) AND ($tbl.$date2 BETWEEN '$dfrom' AND '$dto')";

    $result = mysqli_query($conn, $query);
    
     
    while ($row = mysqli_fetch_assoc($result)){
        fputcsv($output, $row);
    }

    fclose($output);
    
}
else{
    //echo"bye";
}

}

?>