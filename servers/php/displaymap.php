﻿<!DOCTYPE html>
<html>
<head>
    <title>Google Map GPS Cell Phone Tracker</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
 
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maps.google.com/maps/api/js?v=3&sensor=false&libraries=adsense"></script>
    <script src="javascript/maps.js"></script>
    <script src="javascript/leaflet-0.7.3/leaflet.js"></script>
    <script src="javascript/leaflet-plugins/google.js"></script>
    <script src="javascript/leaflet-plugins/bing.js"></script>
    <link href="javascript/leaflet-0.7.3/leaflet.css" rel="stylesheet" type="text/css" />
    <link href="styles/styles.css" rel="stylesheet" type="text/css" />
	
    <script type="text/javascript">
    //<![CDATA[
        var routeSelect;
        var refreshSelect;
        var messages;
        var map;
        var intervalID;
        var newInterval;
        var currentInterval;
        var zoomLevelSelect;
        var zoomLevel;

        function load() {
            // the code to process the data is in the javascript/maps.js file

            routeSelect = document.getElementById('selectRoute');
            refreshSelect = document.getElementById('selectRefresh');
            zoomLevelSelect = document.getElementById('selectZoomLevel');
            messages = document.getElementById('messages');
            map = document.getElementById('map');

            intervalID = 0;
            newInterval = 0;
            currentInterval = 0;
            zoomLevel = 12;

            zoomLevelSelect.selectedIndex = 11;
            refreshSelect.selectedIndex = 0;
            showWaitImage('Loading routes...');
            var i = 0;

            // when the page first loads, get the routes from the DB and load them into the dropdown box.           
            $.ajax({
                url: 'getroutes.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                //console.log("success loadRoutes"); 
                loadRoutes(data);
            },
            error: function (xhr, status, errorThrown) {
                console.log("responseText: " + xhr.responseText);
                console.log("status: " + xhr.status);
                console.log("errorThrown: " + errorThrown);
            }
          });
        }
     //]]>
     </script>

</head>
<body  onload="load()">    
    <div id="messages">GpsTracker</div>
    <div id="map"></div>

    <select id="selectRoute" onchange="getRouteForMap();" tabindex="1"></select>

    <select id="selectRefresh" onchange="autoRefresh();" tabindex="2">
        <option value ="0">Auto Refresh - Off</option>
        <option value ="60">Auto Refresh - 1 minute</option>
        <option value ="120">Auto Refresh - 2 minutes</option>
        <option value ="180">Auto Refresh - 3 minutes</option>
        <option value ="300">Auto Refresh - 5 minutes</option>
        <option value ="600">Auto Refresh - 10 minutes</option>
    </select>

    <select id="selectZoomLevel" onchange="changeZoomLevel();" tabindex="3">
        <option value ="1">Zoom Level - 1</option>
        <option value ="2">Zoom Level - 2</option>
        <option value ="3">Zoom Level - 3</option>
        <option value ="4">Zoom Level - 4</option>
        <option value ="5">Zoom Level - 5</option>
        <option value ="6">Zoom Level - 6</option>
        <option value ="7">Zoom Level - 7</option>
        <option value ="8">Zoom Level - 8</option>
        <option value ="9">Zoom Level - 9</option>
        <option value ="10">Zoom Level - 10</option>
        <option value ="11">Zoom Level - 11</option>
        <option value ="12">Zoom Level - 12</option>
        <option value ="13">Zoom Level - 13</option>
        <option value ="14">Zoom Level - 14</option>
        <option value ="15">Zoom Level - 15</option>
        <option value ="16">Zoom Level - 16</option>
        <option value ="17">Zoom Level - 17</option>
    </select>

    <input type="button" id="delete" value="Delete" onclick="deleteRoute()" tabindex="4">
    <input type="button" id="refresh" value="Refresh" onclick="getRouteForMap()" tabindex="5">

     <div id="test"><== after you select a route below, check out the different map providers here. I'm using google maps, bing maps and OpenStreetMaps but there are many more providers. 	 
    </div>
</body>
</html>





