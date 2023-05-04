
let drivers_urls = driversUrl();
let add_driver_url = drivers_urls[0];
let admin_all_drivers = drivers_urls[1];
let approve_url = drivers_urls[2];
let disapprove_url = drivers_urls[3];
let block_url = drivers_urls[4];
let search_url = drivers_urls[5];

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('#add_driver').click(function () {
    $('.alert-success').hide();
    let fist_name = $('input[name="first_name"]').val();
    let last_name = $('input[name="last_name"]').val();
    let email = $('input[name="email"]').val();
    let phone_number = $('input[name="phone_number"]').val();
    let password = $('input[name="password"]').val();
    let password_confirmation = $('input[name="password_confirmation"]').val();
    let user_type = $('input[name="user_type"]').val();
    let creator_id = $('input[name="creator_id"]').val();
    console.log(fist_name);

    $.ajax({
        type: 'post',
        url: add_driver_url,
        data: {
        first_name : fist_name ,
            last_name : last_name,
            email : email,
            password : password,
            password_confirmation: password_confirmation,
            creator_id: creator_id,
            user_type : user_type,
            phone_number : phone_number
    },
    success: function (response) {
        // $(".rooms-listing-container").html(response);
        console.log(response);
        $('.alert-success').show();
        $('.suc-msg').html(response);
        $('#add-driver-modal').modal('toggle');

    }
});
    //for the list of all drivers
    $.ajax({
        type: 'get',
        url: admin_all_drivers,
        success: function (response) {
        console.log(response);
        $('.driver-table').html(response);
    }
});
});


$(document).ready(function(){
    $('body').on('click','.btn-detail',function(){
        let id = $(this).attr('id');
        vehicleDetails(detailURL, id);
        $('#myModal').modal('toggle');
    });
});

    $('body').on('click','.approve-driver',function(){
        let id = $(this).attr('id');
        if (confirm('Are You Sure Want to Active This Driver...')){
            $.ajax({
                type: 'get',
                url: approve_url,
                data: {id: id},
                success: function (response) {
                    console.log(response);
                    $("#myTable").dataTable().fnClearTable(); //clear the table
                    $('#myTable').dataTable().fnDestroy(); //destroy the datatable
                    $('.driver-table').html(response);
                    $('#myTable').DataTable();

                }
            });
        }

});


    $('body').on('click','.disapprove-driver',function(){
        let id = $(this).attr('id');
        if (confirm('Are You Sure Want to Inactive Or Block This Driver...')) {
            $.ajax({
                type: 'get',
                url: disapprove_url,
                data: {id: id},
                success: function (response) {
                    console.log(response);
                    $("#myTable").dataTable().fnClearTable(); //clear the table
                    $('#myTable').dataTable().fnDestroy(); //destroy the datatable
                    $('.driver-table').html(response);
                    $('#myTable').DataTable();

                }
            });
        }
});


    $('body').on('click', '.block-driver', function () {
     if (confirm('Are You Sure Want To Block This Driver.. ?')){
        let id = $(this).attr('id');
        $.ajax({
            type: 'get',
            url: block_url,
            data: {id: id},
        success: function (response) {
            console.log(response);
            $('.driver-table').html(response);
        }
    });
     }
});

// Function for get the list of MyLift driver not created by the admin
$('.driver-list').click(function () {
    $('#loading_gif').show();
    $.ajax({
        type: 'get',
        url: admin_all_drivers,

        success: function (response) {
        console.log(response);
        $('.driver-table').html(response);
        $('#loading_gif').hide();
    }
});
});



$('#btn_search').click(function () {
    let search_qry = $('input[name="search_qry"]').val();
    if (search_qry == null || search_qry === ''){
        alert('Please use a email to search a driver.. !')
    }else {
        searchDriver(search_qry);
    }
});

function searchDriver(search_qry) {
    $.ajax({
        type: 'get',
        url: search_url,
        data : {'search_qry' : search_qry},
    success: function (response) {
        $('.searched-result').html(response);
    }
});
}

