<?php  
include("db.php");


// Get parameters from URL
$center_lat = $_GET["lat"];
$center_lng = $_GET["lng"];
$radius = $_GET["radius"];



function parseToXML($htmlStr)
{

$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
//$xmlStr=str_replace("'",'&apos',$xmlStr);
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
$query = sprintf("SELECT ID, ProjectTitle, Excavator, InvestigationType, KeyWords,StartDate, lat, lng, Description, ( 3959 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance FROM ARM WHERE  ARMType = 'Project'  HAVING distance < '%s' ORDER BY distance",
  mysqli_real_escape_string($con,$center_lat),
  mysqli_real_escape_string($con,$center_lng),
  mysqli_real_escape_string($con,$center_lat),
  mysqli_real_escape_string($con,$radius));
  
  

$result = mysqli_query($con,$query);

if (!$result) {
  die("Invalid query: " . mysql_error($con));
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each
while ($row =  mysqli_fetch_assoc($result)){
  


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
  $newnode->setAttribute("distance", round($row['distance'],2));
}

echo $dom->saveXML($dom->documentElement);
?>