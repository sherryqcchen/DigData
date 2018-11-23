<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Archaeology Directory</title>
   		<link rel="stylesheet" href="../css/idangerous.swiper.css">
        <link rel="stylesheet" href="../css/Show.css">

   		<link rel="stylesheet" href="../css/bootstrap.css">

	    <link rel="stylesheet" type="text/css" href="../css/JQfiles-li/CSSreset.min.css" />
		<link rel="stylesheet" type="text/css" href="../css/JQfiles-li/default.css">
		<link rel="stylesheet" type="text/css" media="screen" href="../css/JQfiles-li/als_demo.css" />

	   <script src="../js/jquery-2.1.1.min.js"></script>
	   <script src="../js/bootstrap.min.js"></script>
        
  <style>
  #mapCanvas {
    width: 100%;
    height: 420px;
	margin: 8px 0 8px 0
  }


</style>

	</head>

	<body data-spy="scroll" data-target="#myScrollspy">

		<div class="container">
			<div class="row">
<!--Navgiation bar-->
				<nav class="navbar navbar-default">
				  <div class="container-fluid">
				    <!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      <a class="navbar-brand" href="#">ARM</a>
				    </div>

				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				      <ul class="nav navbar-nav">
				        <li><a href="index.php">Home </a></li>
				        <li class="active"><a href="Directory_1.php">Directory</a></li>
				        <li><a href="Forum.php">Forum</a></li>
				      </ul>

				          <ul class="nav navbar-nav navbar-right">
				      	<li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <span class="caret"></span></a>
        <!--User Action-->
				          <ul class="dropdown-menu">
				            <li><a href="profile.php">Me</a></li>
				            <li><a href="logout.php">Logout</a></li>
				          </ul>
				       </li>
				      </ul>
				    </div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>
            </div>
        </div>
 <form  method="post" >
 
  <div id="markerStatus"><i>Please drag project marker into position</i></div>
	
  <div id="mapCanvas"></div><hr>
  
  <p class="latlng"><label>Latitude </label><input name="lat" id="lat" type="text" value="0"  maxlength="40" readonly></p>
  <p class="latlng"><label>Longitude </label><input name="lng" id="lng" type="text"  value="0" maxlength="40" readonly></p>
  
  
<input name="millie" type="hidden" value="monkey" />



<input name="ProjectTitle" type="hidden" value="<?php echo $ProjectTitle;?>" />
<input name="ProjectLinks" type="hidden" value="<?php echo $ProjectLinks;?>" />
<input name="Excavator" type="hidden" value="<?php echo $Excavator;?>" />
<input name="InvestigationType" type="hidden" value="<?php echo $InvestigationType;?>" />
<input name="InvestigationOther" type="hidden" value="<?php echo $InvestigationOther;?>" />
<input name="KeyWords" type="hidden" value="<?php echo $KeyWords;?>" />
<input name="StartDate" type="hidden" value="<?php echo $StartDate;?>" />
<input name="EndDate" type="hidden" value="<?php echo $EndDate;?>" />
<input name="RadioCarbonData" type="hidden" value="<?php echo $RadioCarbonData;?>" />
<input name="Description" type="hidden" value="<?php echo $Description;?>" />


<p><input type="submit" class="btn btn-primary btn-xl" value="Submit: Step 2 of 2" /></p>
</form>

<script>

function updateMarkerPosition(latLng) {
  document.getElementById('lat').value = latLng.lat().toFixed(5);
  document.getElementById('lng').value = latLng.lng().toFixed(5);
}

function updateMarkerStatus(str) {
  document.getElementById('markerStatus').innerHTML = str;
}



function initMap() {
  
  // var latLng  = {lat: 40, lng: 40};

 
   var address = "<?php echo $Location;?>";
  
         var geocoder = new google.maps.Geocoder();
         geocoder.geocode({address: address}, function(results, status) {
           if (status == google.maps.GeocoderStatus.OK) {
			var mapCenter = results[0].geometry.location;
		    var zoomFactor = 8;
			updateMarkerPosition(results[0].geometry.location);
			
			
			
		   } else {
             alert('Please user scroll and zoom to place marker');
			 var mapCenter = {lat: 57.47, lng: -4.22};
			 var zoomFactor = 4;
           }
		   
		   var map = new google.maps.Map(document.getElementById('mapCanvas'), {
               zoom: zoomFactor,
               center: mapCenter,
	           scrollwheel:false,
               mapTypeId: google.maps.MapTypeId.ROADMAP
            });
			
		   var marker = new google.maps.Marker({
             map: map,
		     position: mapCenter,
             draggable: true
          
           });
		   
		   google.maps.event.addListener(marker, 'drag', function() {
           updateMarkerPosition(marker.getPosition());
	       updateMarkerStatus('Moving map marker...');
           });
	
	       google.maps.event.addListener(marker, 'dragend', function() {
           updateMarkerStatus('Add map marker here.');
 
		   
         });
		 
    
  });
 
	
}

</script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4S2WqqtmLaYLUW1s9AgFepbROZQan-E0&callback=initMap">
</script>    
    
    </body>
</html>
