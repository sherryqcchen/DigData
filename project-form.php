
<a name="map"></a>

<?php

// Create connection
 include("db.php");

/* FIELDS
projectID
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



// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
//CHECK FORM 1 DATA
$checkPASS=0;

// Escape
foreach ($_POST as $key => $value) {
   $_POST[$key] = mysqli_real_escape_string($con,str_replace("&","and",$value));
}

$ProjectTitle = $_POST['ProjectTitle'] ?? null;
$ProjectLinks = $_POST['ProjectLinks'] ?? null;
$Excavator = $_POST['Excavator'] ?? null;
$InvestigationType = $_POST['InvestigationType'] ?? null;
$InvestigationOther = $_POST['InvestigationOther'] ?? null;
$KeyWords = $_POST['KeyWords'] ?? null;
$StartDate = $_POST['StartDate'] ?? null;
$EndDate = $_POST['EndDate'] ?? null;
$RadioCarbonData = $_POST['RadioCarbonData'] ?? null;
$Description = $_POST['Description'] ?? null;
$lat = $_POST['lat'] ?? null;
$lng = $_POST['lng'] ?? null;
$Location = $_POST['Location'] ?? null;
$millie = $_POST['millie'] ?? null;
$george = $_POST['george'] ?? null;

$IPAddress = get_client_ip();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);




if ($ProjectTitle!="")
{
   //PULL DATA
   if ($millie=='monkey') {
   $checkPASS=3;

   //save database
   }
   else {
   $checkPASS=1;
   // STEP - FORM 2
   } //

}

//MISSING DATA
else {
   if ($george=='george') {
   $checkPASS=2;
   //echo "TEST ERROR 44".$checkPASS;
  }
} // end CHECK FORM 1 DATA




//ERROR MESSAGES
$errorMES = "<b>Message:</b><br>";

if ($ProjectTitle=="")  // needs to match form
{$errorMES = $errorMES."Please add Project Title.<br>";}


//////////////////////////////////////////////////////////////////


	//STEP 1 - first pass
	if ($checkPASS==0){
		include("form1.php");
		//echo "First Pass 61".$checkPASS;
		}

	//STEP 2 - Second Pass with Error Messages
	else {

		 //ERROR MESSAGE
		 if ($checkPASS==2){
		 ?>
			 <div class="warning"><?php echo $errorMES;?></div>


		 <?php include("form1.php");

		 }// end


		 // SUCCESS CHECK > Get 2 form
		 else {
		 if ($checkPASS!=3&&$george=='george'){

			include("form2.php");

		 }


		 }

	}// end STEP 2


///// STEP 3 ////////////////////////

if ($checkPASS==3){


$sql = mysqli_query($con,"INSERT INTO ARM (ProjectTitle, ProjectLinks, Excavator, InvestigationType, InvestigationOther, KeyWords, StartDate, EndDate, RadioCarbonData, Description,lat,lng,Location, ARMType)
VALUES('$ProjectTitle', '$ProjectLinks', '$Excavator', '$InvestigationType', '$InvestigationOther', '$KeyWords', '$StartDate', '$EndDate', '$RadioCarbonData', '$Description', '$lat', '$lng', '$Location', 'Project')")


       or die (mysqli_error($con));


if(!$sql){
    echo 'There has been an error, please contact the webmaster.';
}





// END ADD DATA ////////////////////


$newID = mysqli_insert_id($con);



$mapID=$newID;

//ADD MESSAGE

  header("Location: Directory_1.php");



} // END STEP 3
