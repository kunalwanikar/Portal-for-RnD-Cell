<?php

function getDate1($tbl){

if($tbl == 'books'){
    $date = 'Publication_date';
    return $date;
}

elseif($tbl == 'conferences'){
    $date = 'Date_From';
    return $date;
}

elseif($tbl == 'patents'){
    $date = 'Patent_Grant_Year';
    return $date;
}

elseif($tbl == 'papers'){
    $date = 'Publication_year';
    return $date;
}

elseif($tbl == 'workshops'){
    $date = 'Date_from';
    return $date;
}

elseif($tbl == 'innovations'){
    $date = 'Innovation_date';
    return $date;
}

elseif($tbl == 'externally_funded_projects'){
    $date = 'Date_to';
    return $date;
}

elseif($tbl == 'trainings'){
    $date = 'Date_to';
    return $date;
}

else{
    $date = 'Date_to';
    return $date ;
}

}



?>