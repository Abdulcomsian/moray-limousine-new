$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
let bookingUrl = bookingsUrl();
let all_url = bookingUrl[0];
let pending_url = bookingUrl[1];
console.log(pending_url);
let assigned_url = bookingUrl[2];
let canceled_url = bookingUrl[3];
let completed_url = bookingUrl[4];
let approved_url = bookingUrl[5];
let paid_url = bookingUrl[6];
let id_url = bookingUrl[7];
let bookings_url_date = bookingUrl[8];
let payout_bookings_url = bookingUrl[9];
let payout_new_url = bookingUrl[10];


$(document).ready(function () {
    $('#filterByDate').click(function () {
        let from_date = $('#form_date').val();
        let to_date = $('#to_date').val();
        $.ajax({
            type: 'get',
            url: bookings_url_date,
            data : {'from_date' : from_date , 'to_date' : to_date},
            success: function (response) {
                console.log(response);
                $('#loader').show();
                $("#myTable").dataTable().fnClearTable(); //clear the table
                $('#myTable').dataTable().fnDestroy(); //destroy the datatable
                $('#bookings-list-table').html(response);
                $('#myTable').DataTable();
                $('#loader').hide();
            }
        });
    });





    function getBookings(url){
        $.ajax({
            type: 'get',
            url: url,
            success: function (response) {

                $('#loader').show();
                $("#myTable").dataTable().fnClearTable(); //clear the table
                $('#myTable').dataTable().fnDestroy(); //destroy the datatable
                $('#bookings-list-table').html(response);
                $('#myTable').DataTable();
                $('#loader').hide();
            }
        });
    }


   $('.payout-bookings').click(function () {
      getBookings(payout_bookings_url);
   });

    $('.all-booking').click(function () {
        getBookings(all_url);
    });

    $('.pending-booking').click(function () {
        getBookings(pending_url);
    });
    $('.new-booking').click(function () {
        getBookings(payout_new_url);
    });
    
    $('.canceled-booking').click(function () {
        getBookings(canceled_url);
    });
    $('.approved-Booking').click(function () {
        getBookings(approved_url);
    });
    $('.paid-booking').click(function () {
        getBookings(paid_url);
    });
    $('.completed-booking').click(function () {
        getBookings(completed_url);
    });

    $('.btn-search').click(function () {
        let id = $('#search_bookings').val();
        getBookings(id_url+id);
    });





    $('.completed-bookings').click(function () {
        getBookings(completed_url);
        $('.booking-heading').html('COMPLETED BOOKINGS LIST');
    });

    $('.pending-bookings').click(function () {
        getBookings(pending_url);
        $('.booking-heading').html('PENDING BOOKINGS LIST');
    });

    $('.all-bookings').click(function () {
        getBookings(all_url);
        $('.booking-heading').html('ALL BOOKINGS LIST');
    });
    $('.btn-search-bookings').click(function () {
        getBookingsByDate(bookings_url_date);
    });

    $('.delete-bookings').click(function (e) {
        if (!confirm('Are You Sure To Want To Delete This Booking...')){
            e.preventDefault();
        }
    });
    $('.disapprove-booking').click(function (e) {
        if (!confirm('Are You Sure To Want To DisApprove This Booking...')){
            e.preventDefault();
        }
    });

   


    function getBookingsByDate(url){
        let start_date = $('input[name="start_date"]').val();
        let end_date = $('input[name="end_date"]').val();
        $.ajax({
            type: 'get',
            url: url,
            data: {'start_date' : start_date , 'end_date' : end_date},
            success: function (response) {
                $('#loader').show();
                $("#myTable").dataTable().fnClearTable(); //clear the table
                $('#myTable').dataTable().fnDestroy(); //destroy the datatable
                $('#bookings-list-table').html(response);
                $('#myTable').DataTable();
                $('#loader').hide();
            }
        });
    }

});
//filter bookings by date
