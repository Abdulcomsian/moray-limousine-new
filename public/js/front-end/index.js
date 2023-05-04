$(function(){
    $.get("https://ipinfo.io", function(response) {
      console.log("result is    " +response.city, response.country);
      }, "jsonp");
})
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
// Form Validations
$('#pick-date').change(function () {
    $(this).siblings('.form-error').hide();
    $(this).css('border-color','green');
});
$('#pick_date_hour').change(function () {
    $(this).siblings('.form-error').hide();
    $(this).css('border-color','green');
});
$('#pick_time_hour').change(function () {
    $(this).siblings('.form-error').hide();
    $(this).css('border-color','green');
});
$('#pick-time').change(function () {
    $(this).siblings('.form-error').hide();
    $(this).css('border-color','green');
});

$('#pick-date2').change(function () {
    $(this).siblings('.form-error').hide();
    $(this).css('border-color','green');
});
$('#pick-time2').change(function () {
    $(this).siblings('.form-error').hide();
    $(this).css('border-color','green');
});

$('.btn-resurve').click(function (e) {
    id=$(this).attr('id');
    validateAddress();
     e.preventDefault();
    if ($('.pick-address').val() !== "" && $('.lat_pck').val() === ""){
    if (check_city === false){
        e.preventDefault();
        $('.alert-wrong-city').show();
        $('#alert_box_text').html('<strong>Sorry.... !  </strong>  Service Is Not Available In This Area Or City');
    }
    }
    if(id=="fromto")
    {
      // var date1 = new Date($('#d1').val() + " " + $('#t1').val()).getTime();
      // var date2 = new Date($('#d2').val() + " " + $('#t2').val()).getTime();

      var currenttime=moment().tz('Europe/Berlin').format('YYYY-MM-DD H:mm');
      var date1 = new Date(currenttime).getTime();
      var pick_date=$("#pick-date").val();
      var nexttime=pick_date.split(" ");
      var monthnumber=moment().month(nexttime[1]).format("M");
      nexttime=nexttime[2]+"-"+monthnumber+"-"+nexttime[0]+" "+$("#dtp_input3").val();
      var date2 = new Date(nexttime).getTime();
      var msec = date2 - date1;
      var mins = Math.floor(msec / 60000);
      var hours = Math.floor(mins / 60);
     // var time_start = new Date();
     // var time_end = new Date();
     // var value_start = $("#dtp_input3").val().split(':');
     // var value_end = currenttime;
     // value_end=value_end.split(':');
     // time_end.setHours(value_start[0], value_start[1], 0)
     // time_start.setHours(value_end[0], value_end[1], 0)
     // var secs=time_end - time_start;
     // var  hours = Math.floor((secs / (1000 * 60 * 60)) % 24);
     
     // var pick_date=$("#dtp_input2").val();
     // var TodayDate = new Date();
     // var endDate= new Date(Date.parse(pick_date));
     var bookinghoursurl=bookinghoururl();
     $.ajax({
        type: 'get',
        url: bookinghoursurl,
        data:{country,pick_city},
        success: function (response) {
           //    console.log(TodayDate.getDate()+"  is  "+ endDate.getDate());
           // if (endDate.getDate() == TodayDate.getDate()) {
              
                if(hours<=response)
                {
                   $("#selecthour").html(response);
                   $("#urgentbook").modal('show');
                    return false;
                 }
                 else{
                    $("#form"+id).submit();
                 }
             // }else{
             //    $("#form"+id).submit();
             // }
        }});
    }
    else{
         $("#form"+id).submit();
    }
 
     
     
     
});

function validateAddress(){

    if ($('#pick-location').val() !== ""){
        let valid_text = $('.valid-pick');
        if ($('.lat_pck').val() === "" ){
            $('.pick-address').attr('border-color','red');
            valid_text.html('Proper PickUp Address Is Required');
            valid_text.show();
        }else{
            $('.valid-pick').hide();
        }
        if($('#drop-location').val() !== ""){
            if ($('.lat_drop').val() === "" ){
                $('.drop-address').attr('border-color','red');
                $('.valid-drop').html('Proper Drop Address Is Required');
                $('.valid-drop').show();
            }else{
                $('.valid-drop').hide();
            }
        }

    }
    // $('.long_pck').val();
    //
    // $('.lat_drop').val();
    // $('.long_drop').val();
}

let latitude_pick;
let longitude_pick;
let latitude_drop ;
let longitude_drop ;
let booking_city;
let booking_country;
let check_city = false;
let locations_url = locationsUrl();
let locations_list;

// Get Cities Allowed by Admin
function getAllowedCities(url){
    locations_list = null;
    return  $.ajax({
        type: 'get',
        url: url,
        success: function (response) {
            locations_list = response;
        }});
}

$( document ).ready(function() {
    getAllowedCities(locations_url)
});

function initMap() {

    //google map auto complete for per hour form

    var input_field = document.getElementById('pick-location-hour');
    // geographical location types.
    let autocomplete_location = new google.maps.places.Autocomplete(input_field);
    // autocomplete_location.setComponentRestrictions({'country': ['de']});
    autocomplete_location.setFields(['geometry']);

    google.maps.event.addListener(autocomplete_location, 'place_changed', function () {
        var pick_address = autocomplete_location.getPlace();
        latitude_pick = pick_address.geometry.location.lat();
        longitude_pick = pick_address.geometry.location.lng();
        console.log(longitude_pick);
        $('.lat_pck').val(latitude_pick);
        $('.long_pck').val(longitude_pick);
        getCity(latitude_pick,longitude_pick);
    });


    // Create the autocomplete object, restricting the search predictions to
    let input = document.getElementById('pick-location');
    let autocomplete = new google.maps.places.Autocomplete(input);
    // autocomplete.setComponentRestrictions({'country': ['de']});
    autocomplete.setFields(['geometry']);

    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var dropplace = autocomplete.getPlace();
        latitude_pick = dropplace.geometry.location.lat();
        longitude_pick = dropplace.geometry.location.lng();
        console.log(longitude_pick);
        if (longitude_drop !== undefined || longitude_drop === ''){
            findShortestRoute();
        }
         getCity(latitude_pick,longitude_pick);
    });

    //Auto complete for drop Location input
    var inputdrop = document.getElementById('drop-location');
    let auto = new google.maps.places.Autocomplete(inputdrop);
    //auto.setComponentRestrictions({'country': ['de']});
    auto.setFields(['geometry']);

    google.maps.event.addListener(auto,'place_changed', function () {
        var place = auto.getPlace();
        latitude_drop = place.geometry.location.lat();
        longitude_drop = place.geometry.location.lng();
        console.log(latitude_drop);
        console.log(longitude_drop);
        if (longitude_pick !== undefined || longitude_pick === ''){
            findShortestRoute();
        }
    });



    // Find the Shortest Path From Google map API
       function findShortestRoute() {
           let origin = new google.maps.LatLng(latitude_pick, longitude_pick);
           let destination = new google.maps.LatLng(latitude_drop, longitude_drop);
           let directionsService = new google.maps.DirectionsService();
           var request = {
               // origin: 'Berliner Dom, Am Lustgarten, Berlin, Germany',
               // destination: 'Barclaycard Arena, Sylvesterallee, Hamburg, Germany',
               origin: origin,
               destination: destination,
               travelMode: 'DRIVING',
               provideRouteAlternatives : true,
               avoidHighways: false,
               avoidTolls: false,
           };
           directionsService.route(request, function(response, status) {
               if (status === 'OK') {
                   let route_options = [];
                   for (var i = 0; i < response.routes.length; i++)
                   {
                       let route = response.routes[i];
                       let distance = 0;
                       // Total the legs to find the overall journey distance for each route option
                       for (var j = 0; j < route.legs.length; j++)
                       {
                           distance += route.legs[j].distance.value; // metres
                       }
                       route_options.push({
                           'route_id': i,
                           'distance': distance
                       });
                   }
                   route_options.sort(function(a, b) {
                       return parseInt(a.distance) - parseInt(b.distance);
                   });
                   let duration = response.routes[0].legs[0].duration.value;
                   let shortest_distance = (route_options[0]['distance'] * 0.001); // convert metres to kilometres
                   console.log('shortest_distance');
                   console.log(shortest_distance);
                   $('.lat_pck').val(latitude_pick);
                   $('.long_pck').val(longitude_pick);
                   $('.lat_drop').val(latitude_drop);
                   $('.long_drop').val(longitude_drop);
                   $('.total_distance').val(route_options[0]['distance']);
                   $('.total_duration').val(duration);
               }
           });
       }


    //Function for Check City against selected Pick Up Location
    function getCity(lat , lng){
        let latlng = new google.maps.LatLng(lat , lng);
        let geocoder = new google.maps.Geocoder;

        geocoder.geocode({'latLng': latlng}, function(results, status,timeZoneId) {
            console.log(timeZoneId);
            if (status === google.maps.GeocoderStatus.OK) {
                let length = results.length - 1;
                country = results[length].formatted_address;
                booking_country=country;
                if (results[1]) {
                    console.log(results);
                    //find city name
                    for (var i=0; i<results[0].address_components.length; i++) {
                        for (var b=0;b<results[0].address_components[i].types.length;b++) {
                            //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
                            if (results[0].address_components[i].types[b] === "locality") {
                                //this is the object you are looking for
                                booking_city = results[0].address_components[i];
                                break;
                            }
                        }
                    }
                    //city data
                    pick_city = booking_city.long_name;
                    $('input[name="booking_city"]').val(pick_city);
                    $('input[name="booking_country"]').val(country);
                    $.each(locations_list , function (index , value) {
                        let location_city =  value.location_city;
                        //new work here
                        if(location_city != pick_city){
                            check_city = true;
                             $('.alert-wrong-city').hide();
                            return false;
                         }else {
                             check_city = false;
                             $('.alert-wrong-city').show();
                             $('#alert_box_text').html('<strong>Sorry.... !  </strong>  Service Is Not Available In This Area Or City');
                         }

                        //old work here
                         // if(location_city === pick_city){
                         //    check_city = true;
                         //     $('.alert-wrong-city').hide();
                         //    return false;
                         // }else {
                         //     check_city = false;
                         //     $('.alert-wrong-city').show();
                         //     $('#alert_box_text').html('<strong>Sorry.... !  </strong>  Service Is Not Available In This Area Or City');
                         // }
                    });
                } else {
                    console.log("No results found");
                }
                console.log(booking_city);
            } else {
                console.log("Geocoder failed due to: " + status);
                return 'City Not found';
            }});

    }
}


//when tab is changed Clear the previous form
    $('.hourly-form-tab , .distance-tab').click(function () {
        latitude_pick = undefined;
        longitude_pick = undefined;
        longitude_drop = undefined;
        longitude_drop = undefined;
        $('.pick-address').val(null);
        $('.drop-address').val(null);
    });


window.setTimeout(function() {
    $(".alert-wrong-city").hide();
}, 15000);

