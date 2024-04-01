
let urls = list_urls();
let all_url = urls[0];
let pending_url = urls[1];
let approved_url = urls[2];
let disapproved_url = urls[3];
let blocked_url = urls[4];
let status_url = urls[5];
let disapprove_status_url = urls[6];
let block_status_url = urls[7];
let loading_gif = $('#loading_gif');
let list_heading = $('.list-heading');

$(document).ready( function () {
    $('.myTable').DataTable();
} );

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
let body = $('body');
body.on('click' ,'.notification',function (){
    let user_id = $(this).attr('id');
    $('input[name="user_id"]').val(user_id);
    $('#exampleModalCenter').modal('toggle');
});

body.on('click','.btn-detail',function(){
        let id = $(this).attr('id');
        vehicleDetails(detailURL, id);
        $('#myModal').modal('toggle');
    });


body.on('click','.approve-driver',function(){
        loading_gif.show();
        let id = $(this).attr('id');
        $.ajax({
            type: 'get',
            url: status_url,
            data: {id: id},
        success: function (response) {
            $(".myTable").dataTable().fnClearTable(); //clear the table
            $('.myTable').dataTable().fnDestroy(); //destroy the datatable
            $('.driver-table').html(response);
            $('.myTable').DataTable();
            loading_gif.hide();
        }
    });
    });



    body.on('click','.disapprove-driver',function(){
        loading_gif.show();
        let id = $(this).attr('id');
        $.ajax({
            type: 'get',
            url: disapprove_status_url,
            data: {id: id},
        success: function (response) {
            $(".myTable").dataTable().fnClearTable(); //clear the table
            $('.myTable').dataTable().fnDestroy(); //destroy the datatable
            $('.driver-table').html(response);
            $('.myTable').DataTable();
            loading_gif.hide();
        }
    });
    });


$(document).ready(function() {
    body.on('click', '.block-driver', function () {
        loading_gif.show();
        let id = $(this).attr('id');
        $.ajax({
            type: 'get',
            url: block_status_url,
            data: {id: id},
        success: function (response) {
            $(".myTable").dataTable().fnClearTable(); //clear the table
            $('.myTable').dataTable().fnDestroy(); //destroy the datatable
            $('.driver-table').html(response);
            $('.myTable').DataTable();
            loading_gif.hide();
        }
    });
    });
});




$('.all-drivers-list').click(function () {
    getDriversList(all_url);
    list_heading.html('ALL DRIVERS LIST');
});

$('.pending-drivers-list').click(function () {
    getDriversList(pending_url);
    list_heading.html('PENDING DRIVERS LIST');
});
$('.approved-drivers-list').click(function () {
    getDriversList(approved_url);
    list_heading.html('APPROVED DRIVERS LIST');
});
$('.disapproved-drivers-list').click(function () {
    getDriversList(disapproved_url);
    list_heading.html('DISAPPROVED DRIVERS LIST');
});
$('.blocked-drivers-list').click(function () {
    getDriversList(blocked_url);
    list_heading.html('BLOCKED DRIVERS LIST');
});


function getDriversList(url) {
    loading_gif.show();
        $.ajax({
            type: 'get',
            url: url,
            success: function (response) {
                $(".myTable").dataTable().fnClearTable(); //clear the table
                $('.myTable').dataTable().fnDestroy(); //destroy the datatable
                $('.driver-table').html(response);
                $('.myTable').DataTable();
                loading_gif.hide();
            }
        });
}









//for the list of all drivers registered by admin
// $('.admin-drivers-list').click(function () {
//     $('#loading_gif').show();
//     $.ajax({
//         type: 'get',
//         url: '{{url('admin/admin-drivers-list')}}',
//
//         success: function (response) {
//         $('#loading_gif').hide();
//         $('.driver-table').html(response);
//     }
// });
// });

// $('#add_driver').click(function () {
//     $('.alert-success').hide();
//     let fist_name = $('input[name="first_name"]').val();
//     let last_name = $('input[name="last_name"]').val();
//     let email = $('input[name="email"]').val();
//     let phone_number = $('input[name="phone_number"]').val();
//     let password = $('input[name="password"]').val();
//     let password_confirmation = $('input[name="password_confirmation"]').val();
//     let user_type = $('input[name="user_type"]').val();
//     let creator_id = $('input[name="creator_id"]').val();
//     console.log(fist_name);
//
//     $.ajax({
//         type: 'post',
//         url: '{{url('admin/register-driver')}}',
//         data: {
//         first_name : fist_name ,
//             last_name : last_name,
//             email : email,
//             password : password,
//             password_confirmation: password_confirmation,
//             creator_id: creator_id,
//             user_type : user_type,
//             phone_number : phone_number
//     },
//     success: function (response) {
//         // $(".rooms-listing-container").html(response);
//         console.log(response);
//         $('.alert-success').show();
//         $('.suc-msg').html(response);
//         $('#add-driver-modal').modal('toggle');
//
//     }
// });
//     //for the list of all drivers
//     $.ajax({
//         type: 'get',
//         url: '{{url('admin/drivers-list')}}',
//         success: function (response) {
//         console.log(response);
//         $('.driver-table').html(response);
//     }
// });
// });

// Function for get the list of MyLift driver not created by the admin
// $('.driver-list').click(function () {
//     $('#loading_gif').show();
//     $.ajax({
//         type: 'get',
//         url: '{{url('admin/drivers-list')}}',
//
//         success: function (response) {
//         console.log(response);
//         $('.driver-table').html(response);
//         $('#loading_gif').hide();
//     }
// });
// });

// function to to get all driver list
// $('.all-drivers-list').click(function () {
//     $('#loading_gif').show();
//     $.ajax({
//         type: 'get',
//         url: '{{url('admin/all-driver-list')}}',
//
//         success: function (response) {
//         $('#loading_gif').hide();
//         console.log(response);
//         $('.driver-table').html(response);
//     }
// });
// });
