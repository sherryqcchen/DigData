<?php


// Select all the rows in the markers table

$query = "SELECT InvestigationType, COUNT(*) FROM ARM WHERE ARMType = 'Project' GROUP BY InvestigationType ORDER BY COUNT(*) DESC";

$result = mysqli_query($con,$query);

$typeList = "";

$listArray=array();

$i = 0;

while ($row = mysqli_fetch_assoc($result)){


array_push($listArray, array(urlencode($row["InvestigationType"])."_list"));

/*
$newType = $row["Type"];
if ($row["Type"]=="Learner"){
$newType = "Currently learning";
}*/

array_push($listArray[$i],$row["InvestigationType"].' ('. $row["COUNT(*)"].')');


 

switch ($row["InvestigationType"]) {
		
 
    case "Dating":
        array_push($listArray[$i],'#F5E049'); //YELLOW
		
         break;
	case "Excavation":
	    array_push($listArray[$i],'#FF6600'); //ORANGE
         break;

    case "Sampling":
        array_push($listArray[$i],'#669900'); //GREEN
         break;
    case "Other":
        array_push($listArray[$i],'#FF0000'); //RED
         break;

    default:
	    array_push($listArray[$i],'#FF0000');		
    } 
$i++;

}




?>


  
