<?php  
include("db.php");



function parseToXML($htmlStr)
{

$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
//$xmlStr=str_replace("'",'&apos;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
$xmlStr=stripslashes($xmlStr);
$xmlStr=str_replace("\\",'',$xmlStr);
//$xmlStr=utf8_encode($xmlStr);

return $xmlStr;
}



// Start XML file, create parent node
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);



// Search the rows in the markers table

 $query = "SELECT * FROM ARM WHERE ARMType = 'Project'";
  
$result = mysqli_query($con,$query);

if (!$result) {
  die("Invalid query: " . mysql_error($con));
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each
while ($row =  mysqli_fetch_assoc($result)){

  
/* FIELDS
ID
ProjectTitle
ProjectLinks
Excavator
InvestigationType
InvestigationOther
KeyWords
StartDate
EndDate
RadioCarbonData
Description
lat
lng
Location
*/
  

  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("ID", $row['ID']);
  $newnode->setAttribute("ProjectTitle", $row['ProjectTitle']);
  $newnode->setAttribute("Excavator", $row['Excavator']);
  $newnode->setAttribute("InvestigationType", $row['InvestigationType']);
  $newnode->setAttribute("KeyWords", $row['KeyWords']);
  $newnode->setAttribute("StartDate", $row['StartDate']);
  $newnode->setAttribute("Description", $row['Description']);
  

  $newnode->setAttribute("lat", $row['lat']);
  $newnode->setAttribute("lng", $row['lng']);
 
}

echo $dom->saveXML($dom->documentElement);
?>