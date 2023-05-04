let travelAmount;
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$('body').on('change','#options_checkboxes input[type=checkbox]',function(){
    if ($(this).prop('checked')) {
        $(this).next('label').html("Ausgewählt");
        $(this).next('label').css("color","#bf9c60",'font-weight','bold');
    }else{
        $(this).next('label').html("Select Option");
        $(this).next('label').css("color","#26261e");
    }
});


$('#btn_submit').click(function (e) {
     e.preventDefault();
     $('input').removeClass('inputerror');
    let options = getSelectedOptions();
    let option_data = JSON.stringify(options);
    $('#optionData').val(option_data);
    if($("#bookforsomeoneelse").is(':checked'))
    {
        if($("#firstname").val()=="")
        { 
            $("#firstname").addClass('inputerror');
            return false;
        }
        else if($("#lastname").val()=="")
        {
            $("#lastname").addClass('inputerror');
            return false;
        }
        else if($("#email").val()=="")
        {
            $("#email").addClass('inputerror');
            return false;
        }
        else if($("#phone").val()=="")
        {
            $("#phone").addClass('inputerror');
            return false;
        }
        else if($("#company").val()=="")
        {
            $("#company").addClass('inputerror');
        }
        else if($("#address").val()=="")
        {
            $("#address").addClass('inputerror');
        }
    }
   
     $('#options_form').submit();
    
});



function getSelectedOptions() {
    let selected_options=[];
    let i = 0;
    let option_name;
    let option_price = 0;
    let option_quantity;
    let option_id;

    $('.form-options input:checked').not('#bookforsomeoneelse').not("#bookdtls").each(function() {
        option_price = $(this).val();
        option_name = $(this).attr('name');
        option_id = $(this).attr('id');

        option_quantity = $(this).parent().prev().prev('.number').children('.counter').val();
        if(option_quantity === undefined || typeof option_quantity  == "undefined"){
            option_quantity = 1;
        }
        selected_options[i] = {
            "selected_option" : option_name ,
            "option_price" : option_price ,
            'quantity' : option_quantity,
            'option_id' : option_id
        };
        i++;
    });
    return selected_options;
}

let latlongs = getLatLong();
let pick_latitude = latlongs[0];
let pick_longitude = latlongs[1];
let drop_latitude = latlongs[2];
let drop_longitude = latlongs[3];

function initMap() {
        let pickLatLong = {lat: pick_latitude, lng: pick_longitude};
        let dropLatLong = {lat: drop_latitude, lng: drop_longitude};
    let directionsService = new google.maps.DirectionsService();
    var directionsRenderer = new google.maps.DirectionsRenderer();
        var map = new google.maps.Map(
            document.getElementById('route_map'),
            {zoom: 12, center: pickLatLong});
        var pickMarker = new google.maps.Marker({position: pickLatLong, map: map});
        var DropMarker = new google.maps.Marker({position: dropLatLong, map: map});

        let originLatLong = new google.maps.LatLng(pick_latitude, pick_longitude);
        let destinationLatLong = new google.maps.LatLng(drop_latitude, drop_longitude);

      calculateAndDisplayRoute(directionsService , directionsRenderer , originLatLong , destinationLatLong)
     directionsRenderer.setMap(map);

    // var flightPath = new google.maps.Polyline({
        //     path: flightPlanCoordinates,
        //     geodesic: true,
        //     strokeColor: '#1732be',
        //     strokeOpacity: 2.0,
        //     strokeWeight: 5
        // });
        //
        // flightPath.setMap(map)
}


function calculateAndDisplayRoute(directionsService, directionsRenderer , pickLatLong ,dropLatLong ) {

    directionsService.route(
        {
            // origin: 'Berlin–Tegel internasjonale lufthavn (TXL), Saatwinkler Damm, Berlin, Germany',
            origin: pickLatLong,
            destination: dropLatLong,
            // destination: 'Berliner Dom, Am Lustgarten, Berlin, Germany',
            travelMode: 'DRIVING'
        },
        function(response, status) {
            if (status === 'OK') {
                directionsRenderer.setDirections(response);
                console.log(response)
            } else {
                console.log('Directions request failed due to ' + status);
            }
        });
}






$(document).ready(function() {
   btnMinusClick();
   btnPlusClick();
});

function btnMinusClick(){
    $('.minus').click(function () {
        let $input = $(this).parent().find('input');
        let count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });
}

function btnPlusClick(){
    $('.plus').click(function () {
        let plus_btn = $(this);
        let input =  plus_btn.prev();
        let max_limit = input.attr('maxlength');
        let input_value = plus_btn.prev().val();

        if (input_value >= max_limit){
           return false;
        }
        console.log(input.attr('maxlength'));

        let $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });
}
