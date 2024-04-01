
let urls = partner_list_urls();
let all_url = urls[0];
let pending_url = urls[1];
let approved_url = urls[2];
let disapproved_url = urls[3];
let blocked_url = urls[4];
let search_url = urls[5];
let loading_gif = $('#loading_gif');
let list_heading = $('.list-heading');
let body = $('body');

$(document).ready( function () {
    $('#myTable').DataTable();


    body.on('click' ,'.notification',function (){
        let user_id = $(this).attr('id');
        $('input[name="user_id"]').val(user_id);
        $('#exampleModalCenter').modal('toggle');
    });
    body.on('click' ,'#delete_partner',function (e){
        if(confirm('Are you Sure Want to delete this partner ? All the information will also be deleted related to this user') === false){
            e.preventDefault();
        }
    });

    body.on('click' ,'#block_partner',function (e){
        if(confirm('Are you Sure Want to Block this partner ? This Partner Will Not able to perform his activities once he blocked') === false){
            e.preventDefault();
        }
    });
} );
$('#create-partner').click(function () {
    $('#add-driver-modal').modal('toggle');
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



function getPartnersList(url) {
    loading_gif.show();
    $.ajax({
        type: 'get',
        url: url,
        success: function (response) {
            $("#myTable").dataTable().fnClearTable(); //clear the table
            $('#myTable').dataTable().fnDestroy(); //destroy the datatable
            $('.table-content').html(response);
            $('#myTable').DataTable();
            loading_gif.hide();
        }
    });
}


$('.all-partners-list').click(function () {
    getPartnersList(all_url);
    list_heading.html('ALL DRIVERS LIST');
});

$('.pending-partners-list').click(function () {
    getPartnersList(pending_url);
    list_heading.html('PENDING PARTNERS LIST');
});
$('.approved-partners-list').click(function () {
    getPartnersList(approved_url);
    list_heading.html('APPROVED PARTNERS LIST');
});
$('.disapproved-partners-list').click(function () {
    getPartnersList(disapproved_url);
    list_heading.html('DISAPPROVED PARTNERS LIST');
});
$('.blocked-partners-list').click(function () {
    getPartnersList(blocked_url);
    list_heading.html('BLOCKED PARTNERS LIST');
});
