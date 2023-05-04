
let vehicle_urls = vehicleUrls();
let approveURL = vehicle_urls[0];
let deleteVehicle = vehicle_urls[1];
let disApproveVehicle = vehicle_urls[2];
let detailURL = vehicle_urls[3];

let all_url = vehicle_urls[4];
let pending_url = vehicle_urls[5];
let approved_url = vehicle_urls[6];
let disapproved_url = vehicle_urls[7];
let blocked_url = vehicle_urls[8];


let loading_gif = $('#loading_gif');
$(document).ready( function () {
    $('#myTable').DataTable();
} );
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(document).ready(function(){
    $('body').on('click','.btn-approve',function(){
        let id =   $(this).attr('id');
        changeVehicleStatus(approveURL , id);
    });

    $('body').on('click','.btn-disapprove',function(){
        let id = $(this).attr('id');
        if (confirm('Are You Sure Want To Disapprove This Vehicle .. ?')) {
            changeVehicleStatus(disApproveVehicle, id);
        }
    });
    $('body').on('click','.btn-delete',function(){
        let id = $(this).attr('id');
        if (confirm('Are You Sure Want To Delete This Vehicle .. ?')){
            changeVehicleStatus(deleteVehicle, id);
        }
    });


    $('.all-vehicles-list').click(function () {
        getFilteredVehicles(all_url);
    });
    $('.pending-vehicles-list').click(function () {
        getFilteredVehicles(pending_url);
    });
    $('.approved-vehicles-list').click(function () {
        getFilteredVehicles(approved_url);
    });
    $('.blocked-vehicles-list').click(function () {
        getFilteredVehicles(blocked_url);
    });
});


function changeVehicleStatus(statusURL,id){
    loading_gif.show();
    $.ajax({
        type: 'get',
        url: statusURL+id,
        success: function (response) {
            $("#myTable").dataTable().fnClearTable(); //clear the table
            $('#myTable').dataTable().fnDestroy();
            $('.vehicle-content').html(response);
            $('#myTable').DataTable();
            loading_gif.hide();
        }
    });
}
function getFilteredVehicles(url){
    loading_gif.show();
    $.ajax({
        type: 'get',
        url: url,
        success: function (response) {
            $("#myTable").dataTable().fnClearTable(); //clear the table
            $('#myTable').dataTable().fnDestroy();
            $('.vehicle-content').html(response);
            $('#myTable').DataTable();
            loading_gif.hide();
        }
    });
}
