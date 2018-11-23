<?php

//require_once(ABSPATH ."../inc/db2.php");
include("db.php");


//Limit needs to match XML FEED!
$query = "SELECT * FROM ARM WHERE ARMType = 'Project' ORDER BY ID DESC LIMIT 50";
$result = mysqli_query($con,$query);




$i = 0;
while ($row = @mysqli_fetch_assoc($result)){

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



echo "<li id='".$i."'>";
echo '<strong>'.$row['ProjectTitle'].'</strong>: ';
echo stripslashes($row['Description']).'<br><span style="color:#FECA72">'.$row['InvestigationType'];





echo '</span>';

echo '<div style="clear:both"></div>';

?>
<script>document.getElementById("<?php echo $i;?>").addEventListener("click", function()
{messageMap(<?php echo $row['ID'];?>);}, false);</script>
<?php
echo "</li>";

$i++;

} //while
?>	



