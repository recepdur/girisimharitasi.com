
$(document).ready(function(){
	initialize();
});

$(document).click(function() {
	$(".contextmenu").hide();
});

var map;
var lat;
var lng;

function initialize(){     
	resizeDiv();
	setBaseMap();
	getRecords();
	mapRightClick();		
} 

function resizeDiv() {
	vpw = $(window).width();
	vph = $(window).height();
	vph = vph - 80;
	$('#google_ptm_map').css({'height': vph + 'px'});
}

function setBaseMap(){
	var mapCords = new google.maps.LatLng(38.9574155,35.2415759);
    var mapOptions = {
		zoom: 7,
		center: mapCords, 
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}    
    map = new google.maps.Map(document.getElementById("google_ptm_map"), mapOptions);       
		
}

function getRecords(){
	$.ajax({
		type: "POST",
		url: "setting.php",
		data : {"transaction":"select"},		
		cache: false,
		success: function(result){ 
			setRecords(result);
		}
	});	
}

function setRecords(list){        
    var infoWindow = new google.maps.InfoWindow();
	var markers = [];
	var parsedJSON = JSON.parse(list);
	for (var i=0; i<parsedJSON.startups.length; i++) 
	{
        var cords = new google.maps.LatLng(parsedJSON.startups[i].latitude, parsedJSON.startups[i].longitude);
		var marker = new google.maps.Marker({
			position: cords, map: map, 
			id: parsedJSON.startups[i].id, 
			title: parsedJSON.startups[i].name
			//icon: 'http://maps.google.com/mapfiles/kml/pal3/icon23.png'
		});    		  
		google.maps.event.addListener(marker, 'click', (function(marker, i) {return function() {
				infoWindow.setContent('<a href="#" target="_blank"><div><p style="color:blue;">'+ marker.title +'</p> </div></a>');
                infoWindow.open(map, marker);
            }
        })(marker, i));
		
		markers.push(marker);
		
    }	
	 var markerCluster = new MarkerClusterer(map, markers);
}

function mapRightClick(){
	google.maps.event.addListener(map, "rightclick",function(event){	
		lat = event.latLng.lat();
		lng = event.latLng.lng();
		showContextMenu(event.latLng);
	});
}

function showContextMenu(caurrentLatLng){
    var projection;
    var contextmenuDir;
    projection = map.getProjection() ;
    $('.contextmenu').remove();
    contextmenuDir = document.createElement("div");
    contextmenuDir.className  = 'contextmenu';
    contextmenuDir.innerHTML = '<div class="context_item"><a href="#" onclick="newRecordForm();"><div class="inner_item"> <i class="fa fa-map-marker"></i> Kaydet </div></a></div>';
    $(map.getDiv()).append(contextmenuDir);        
    setMenuXY(caurrentLatLng);
    contextmenuDir.style.visibility = "visible";
}

function newRecordForm(caurrentLatLng){	
	var latlngCor = new google.maps.LatLng(lat,lng);		
	var geocoder = new google.maps.Geocoder();			
	geocoder.geocode({'latLng':latlngCor},function(results,status){		 
		if(status == google.maps.GeocoderStatus.OK)
		{					
			$("#latitude").val(lat);
			$("#longitude").val(lng);
			$("#il").val(results[0].address_components[5].long_name);
			$("#ilce").val(results[0].address_components[4].long_name);
			$("#mahalle").val(results[0].address_components[2].long_name);
			$("#sokak").val(results[0].address_components[1].long_name);
			$('#modal_default_2').modal('show');	
		}		 
	});
	$(".contextmenu").hide();	
}

function setMenuXY(caurrentLatLng){
    var mapWidth = $('#google_ptm_map').width();
    var mapHeight = $('#google_ptm_map').height();
    var menuWidth = $('.contextmenu').width();
    var menuHeight = $('.contextmenu').height();
    var clickedPosition = getCanvasXY(caurrentLatLng);
    var x = clickedPosition.x ;
    var y = clickedPosition.y ;

     if((mapWidth - x ) < menuWidth)
         x = x - menuWidth;
    if((mapHeight - y ) < menuHeight)
        y = y - menuHeight;

    $('.contextmenu').css('left',x  );
    $('.contextmenu').css('top',y );
}

function getCanvasXY(caurrentLatLng){
    var scale = Math.pow(2, map.getZoom());
    var nw = new google.maps.LatLng(
        map.getBounds().getNorthEast().lat(),
        map.getBounds().getSouthWest().lng()
    );
    var worldCoordinateNW = map.getProjection().fromLatLngToPoint(nw);
    var worldCoordinate = map.getProjection().fromLatLngToPoint(caurrentLatLng);
    var caurrentLatLngOffset = new google.maps.Point(
        Math.floor((worldCoordinate.x - worldCoordinateNW.x) * scale),
        Math.floor((worldCoordinate.y - worldCoordinateNW.y) * scale)
    );
    return caurrentLatLngOffset;
}

