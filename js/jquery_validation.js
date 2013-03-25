var geocoder;
var map;
var event_address;
function initialize() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(-34.397, 150.644);
    var mapOptions = {
      zoom: 8,
      center: event_address,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
    var marker = new google.maps.Marker(
    {
      map: map,
      position: event_address
    }
    );
}

function codeAddress() {
    var geocoder= new google.maps.Geocoder();
    var address = 'Sonora Sprinkler Inc.+28955 N+168th Ave+Surprise+AZ 85387';
    geocoder.geocode( 
        { 'address': address }, 
        function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                event_address = results[0].geometry.location;
                initialize();
            }
        }
    );
}
$(document).ready(function(){
	$("#form").submit(function(){
	    canSubmit=true;
	    $(".Email").each(function(){
		var filter =/^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
		if(!filter.test( $(this).val())){
		    $(this).parent().find(".error-message").remove();
		    $(this).after("<div class='alert alert-error'>Please provide a valid Email Address</div>");
		    canSubmit=false;
		}
	    });
	    $(".notEmpty").each(function(){
		if($(this).val()==""){
		    $(this).after("<div class='alert alert-error'>Please Enter Name</div>");
		    canSubmit=false;
		}
	    });
	    return canSubmit;
	});
});