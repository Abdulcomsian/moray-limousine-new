$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

let bookings_url = bookingsUrl();
let pending_url = bookings_url[0];
let canceled_url = bookings_url[1];
let completed_url = bookings_url[2];
let all_url = bookings_url[3];
let date_url = bookings_url[4];
let loading_img = $('.loading-booking-img');
$(document).ready(function () {
    $('#myTable').dataTable({
        responsive : true
    });


    $('#filterByDate').click(function () {
        let from_date = $('#form_date').val();
        let to_date = $('#to_date').val();
        loading_img.show();
        $.ajax({
            type: 'get',
            url: date_url,
            data : {'from_date' : from_date , 'to_date' : to_date},
            success: function (response) {
                console.log(response);
                $("#myTable").dataTable().fnClearTable(); //clear the table
                $('#myTable').dataTable().fnDestroy(); //destroy the datatable
                $('#bookings-table-content').html(response);
                $('#myTable').DataTable();
                loading_img.hide();
            }
        });
    });




});





$('#all-bookings').click(function () {
    getBookings(all_url);
    $('.bookings-hading').html('List Of All Bookings')
});

$('#completed-bookings').click(function () {
    getBookings(completed_url);
    $('.bookings-hading').html('List Of Completed Bookings')
});


$('#pending-bookings').click(function () {
    getBookings(pending_url);
    $('.bookings-hading').html('List Of Pending Bookings')
});


$('#canceled-bookings').click(function () {
    getBookings(canceled_url);
    $('.bookings-hading').html('List Of Canceled Bookings')
});

function getBookings(url){
    loading_img.show();
    $.ajax({
        type: 'get',
        url: url,
        success: function (response) {
           console.log(response);
            $("#myTable").dataTable().fnClearTable(); //clear the table
            $('#myTable').dataTable().fnDestroy(); //destroy the datatable
            $('#bookings-table-content').html(response);
            loading_img.hide();
            $('#myTable').DataTable();
        }
    });
}
