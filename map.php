<?php
//DATA $con
require_once("db.php");
include("typeTable.php");

//print_r($listArray); //test if required

?>



<style>
#map {width: 100%;height: 480px; margin: 8px 0 8px 0; }

#infoBox { padding:2%; width:30%; float:left; border:1px solid #f1f1f1;background-color:#f7f7f7; height:560px; overflow:auto; margin-bottom:12px; }
#infoBox h4 {margin:0; padding:0 0 6px 0}
#infoBox a {color:#990000;}
ul#marker_list{padding:0;margin:0; width:100%;float:left;font-size:11px; }
ul#marker_list li{ border-top:1px solid #f1f1f1;padding:7px;list-style:none;cursor:pointer;font-size:14px; color:#fff;}
.sub{font-size:12px; margin-left:6px; }
.rank{font-weight:bold;margin-right:2px}

#messageBoard { padding:2%; width:70%; float:right;  background:#2c5a71; height:560px; overflow:auto; margin-bottom:12px; color:#fff;}
#messageBoard h4 {margin:0; padding:0 0 6px 0; color:#fff;}
#messageBoard a {color:#3FBEE9;}
#messageBoard ul {margin-top: 16px;}
#messageBoard li{padding-bottom:4px; margin-bottom:16px;list-style:none;cursor:pointer;font-size:15px; border-bottom:dotted 1px #ccc; width:95%;}

#addressInput{width:45%; min-width:260px}
#addMarker{margin-top:24px;}

@media screen and (max-width: 980px){
#infoBox {width:100%; float:none;}
#messageBoard {width:100%; float:none; }
#addressInput{width:100%;}
#map {height: 400px;}

}

.iw-title {
   font-size: 14px;
   font-weight: bold;
   padding: 3px 6px;
   background-color: #00b3ff;
   color: white;
   margin-top: 3px;

}

.iw-content{
   font-size: 13px;
   margin-top: 6px;
   margin-bottom: 6px;
}

.iw-footer{
   font-size: 13px;
   font-weight: bold;
   margin-top: 6px;
   color:#cebd9a;

}

.gm-style-iw {
   width: 340px !important;
   top: 10 !important;
   left: 10 !important;
   border-radius: 4px;
   margin-bottom:8px;
}
</style>

    <div>
      <br>
         <label>Search location:</label>
         <input type="text" id="addressInput"  maxlength="50"/>

    </div>

    <div id="map"></div>


	 <div id="infoBox"><h4>Project Types</h4>
<span class='sub'>Click to view on map</span>
<ul id="marker_list"></ul>
<form action="project-form.php">
    <input type="submit" id="addMarker" value="Add New Project" />
</form>
<form action="Post.php">
<input type="submit" id="addMarker" value="Add New Artifact" />
</form>
</div>
<br>
<div id="messageBoard"><h4>New Projects</h4><span class='sub'>Click to view on map</span>
<ul id="message_list"><?php $map = 2; require("message-panel.php");?></ul></div><div style="clear:both"></div><hr />

<script>

      var map;
      var markers = [];
	  var markerCount = 0;
      var infoWindow;
	  var radius = 70;

   function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
			center: new google.maps.LatLng(55, -4.0),
            zoom: 6,
            mapTypeId: 'roadmap',
            mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU}
          });

          infoWindow = new google.maps.InfoWindow();
          searchButton = document.getElementById("addressInput").onchange = searchLocations;




	   var xmlData ='XMLFeed2.php?r='+Math.floor(Math.random()*100);

       downloadUrl(xmlData, function(data) {
       var xml = parseXml(data);
       var markerNodes = xml.documentElement.getElementsByTagName("marker");
       var bounds = new google.maps.LatLngBounds();
	   var marker;
	   markerCount = markerNodes.length;

/*


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



	   for (var i = 0; i < markerNodes.length; i++) {

             var ID = markerNodes[i].getAttribute("ID");
             var ProjectTitle = markerNodes[i].getAttribute("ProjectTitle");
			 var Excavator = markerNodes[i].getAttribute("Excavator");
			 var InvestigationType = markerNodes[i].getAttribute("InvestigationType");
			 var StartDate = markerNodes[i].getAttribute("StartDate");
			 var Description = markerNodes[i].getAttribute("Description");
             var latlng = new google.maps.LatLng(
                  parseFloat(markerNodes[i].getAttribute("lat")),
                  parseFloat(markerNodes[i].getAttribute("lng")));

             createMarker(ID, latlng, ProjectTitle, Excavator, InvestigationType, Description);
             bounds.extend(latlng);

	   }

	      //fit bounds
	      map.fitBounds(bounds);

	      //Create sidebar
          createMarkerButton();

	    });
      }

   function searchLocations() {
         var address = document.getElementById("addressInput").value;
         var geocoder = new google.maps.Geocoder();
         geocoder.geocode({address: address}, function(results, status) {
           if (status == google.maps.GeocoderStatus.OK) {
            searchLocationsNear(results[0].geometry.location);
           } else {
             alert(address + ' not found');
           }
         });
       }

   function clearLocations() {

		 infoWindow.close();
         for (var i = 0; i < markers.length; i++) {
           markers[i].setMap(null);
         }
         markers.length = 0;


       }

    function searchLocationsNear(center) {

		 clearLocations();
         var searchUrl = 'XMLFeed.php?lat=' + center.lat() + '&lng=' + center.lng() + '&radius=' + radius;
         downloadUrl(searchUrl, function(data) {
           var xml = parseXml(data);
           var markerNodes = xml.documentElement.getElementsByTagName("marker");
           var bounds = new google.maps.LatLngBounds();
           for (var i = 0; i < markerNodes.length; i++) {

			 var ID = markerNodes[i].getAttribute("ID");
             var ProjectTitle = markerNodes[i].getAttribute("ProjectTitle");
			 var Excavator = markerNodes[i].getAttribute("Excavator");
			 var InvestigationType = markerNodes[i].getAttribute("InvestigationType");
			 var StartDate = markerNodes[i].getAttribute("StartDate");
			 var Description = markerNodes[i].getAttribute("Description");
             var latlng = new google.maps.LatLng(
                  parseFloat(markerNodes[i].getAttribute("lat")),
                  parseFloat(markerNodes[i].getAttribute("lng")));


             createMarker(ID, latlng, ProjectTitle, Excavator, InvestigationType, Description);
             bounds.extend(latlng);
           }
		   // if no markers
		   if (markerNodes.length ==0){
		   map.setCenter(center);
		   }
		   else {
           map.fitBounds(bounds);
		   }

         });
       }

	function loadMarkers() {

	   clearLocations();

       var xmlData ='XMLFeed2.php';

       downloadUrl(xmlData, function(data) {
       var xml = parseXml(data);
       var markerNodes = xml.documentElement.getElementsByTagName("marker");
       var bounds = new google.maps.LatLngBounds();
	   var marker;

	   for (var i = 0; i < markerNodes.length; i++) {
             var ID = markerNodes[i].getAttribute("ID");
             var ProjectTitle = markerNodes[i].getAttribute("ProjectTitle");
			 var Excavator = markerNodes[i].getAttribute("Excavator");
			 var InvestigationType = markerNodes[i].getAttribute("InvestigationType");
			 var StartDate = markerNodes[i].getAttribute("StartDate");
			 var Description = markerNodes[i].getAttribute("Description");
             var latlng = new google.maps.LatLng(
                  parseFloat(markerNodes[i].getAttribute("lat")),
                  parseFloat(markerNodes[i].getAttribute("lng")));


             createMarker(ID, latlng, ProjectTitle, Excavator, InvestigationType, Description);
             bounds.extend(latlng);

	   }

	   //fit bounds
	   map.fitBounds(bounds);


         });
       }


       function createMarker(ID, latlng, ProjectTitle, Excavator, InvestigationType, Description) {

		  var html = '<div class="iw-title">' + ProjectTitle + '</div>';

		  if (Description){
		  html = html + "<div class='iw-content'>" + Description + "</div>";}

		  html = html+"<div class='iw-footer'>" +InvestigationType;
		  if (Excavator){
		  html = html+" | " + Excavator; }


		  var icon = "http://www.braw.media/LANGMAP/mrks/red.png";






		switch (InvestigationType) {

    case "Dating":
        icon = "http://www.braw.media/LANGMAP/mrks/yellow.png";
         break;
    case "Sampling":
        icon = "http://www.braw.media/LANGMAP/mrks/green.png";
         break;
    case "Other":
        icon = "http://www.braw.media/LANGMAP/mrks/red.png";
         break;

	case "Excavation":
        icon = "http://www.braw.media/LANGMAP/mrks/orange.png";
		break;

    }



          var marker = new google.maps.Marker({
            map: map,
            position: latlng,
			ProjectTitle:ProjectTitle,
			InvestigationType:InvestigationType,
			Description:Description,
			ID:ID,
			icon:icon
          });

          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);

          });
          markers.push(marker);

        }

  function createMarkerButton() {
  //Creates a sidebar button
  var ul = document.getElementById("marker_list");



  //get array
  <?php $js_array = json_encode($listArray); echo "var listArray = ".$js_array.";\n"; ?>

   for (var i = 0; i < listArray.length; i++) {
         var title = listArray[i][1];
		 var listID = listArray[i][0];
		 var li = document.createElement("li");
		 li.setAttribute("id",listID);
		 li.innerHTML = "<span class='rank'>"+(i+1)+" </span>"+title;
		 li.style.background = listArray[i][2];
         ul.appendChild(li);
		 selectChanged(i,listArray);
   }
}

function selectChanged(i,listArray) {



		document.getElementById(listArray[i][0]).addEventListener('click', function(){
		// Add stuff for each sidebar link

		//Scroll to map
        var target_top = 950;
        jQuery('html,body').animate({scrollTop:target_top },2200, 'easeOutQuart');

		//change background
		for (var n = 0; n < listArray.length; n++) {
		document.getElementById(listArray[n][0]).style.background=listArray[n][2];
		document.getElementById(listArray[n][0]).style.color="#fff";

		}
		document.getElementById(listArray[i][0]).style.background="#e3eaff";
		document.getElementById(listArray[i][0]).style.color="#333";

		infoWindow.close();

		//TYPE BAR CHECK
		if (markerCount != markers.length){
		loadMarkers();
		}



		//get title from button
		var str = listArray[i][1];
		var m = str.lastIndexOf("(");
		var listType = str.slice(0,m-1);  //good

		var newBounds = new google.maps.LatLngBounds();
		var k = 0;
		var p = 0;



		for (var j = 0; j < markers.length; j++) {



			    if (markers[j].InvestigationType==listType){
				markers[j].setVisible(true);
			    newBounds.extend( markers[j].getPosition() );
				k++;
				p = j;


				}
				if (markers[j].InvestigationType!=listType){
				markers[j].setVisible(false);


				}
		 }
		 //alert(title+k);
		// map_canvas.setMapTypeId(google.maps.MapTypeId.ROADMAP);

		// updating bounds in view if more than one marker
		if (k != 1) map.fitBounds(newBounds);
		else  map.setCenter(markers[p].getPosition());




		});
}



       function downloadUrl(url, callback) {
          var request = window.ActiveXObject ?
              new ActiveXObject('Microsoft.XMLHTTP') :
              new XMLHttpRequest;

          request.onreadystatechange = function() {
            if (request.readyState == 4) {
              request.onreadystatechange = doNothing;
              callback(request.responseText, request.status);
            }
          };

          request.open('GET', url, true);
          request.send(null);
       }

       function parseXml(str) {
          if (window.ActiveXObject) {
            var doc = new ActiveXObject('Microsoft.XMLDOM');
            doc.loadXML(str);
            return doc;
          } else if (window.DOMParser) {
            return (new DOMParser).parseFromString(str, 'text/xml');
          }
       }

	   function messageMap(n) {

		infoWindow.close();

		if (markerCount != markers.length){
		loadMarkers();
		}



		//Scroll to map
        var target_top = 950;
        jQuery('html,body').animate({scrollTop:target_top },2200, 'easeOutQuart');

		for (var i = 0; i < markers.length; i++) {

			    if (markers[i].ID==n){
				markers[i].setVisible(true);
				map.setCenter(markers[i].getPosition());
				map.setZoom(8);


				}
				if (markers[i].ID!=n){
				markers[i].setVisible(false);

				}
		 }



	  } //end function

       function doNothing() {}
  </script>

  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4S2WqqtmLaYLUW1s9AgFepbROZQan-E0&callback=initMap">
</script>
