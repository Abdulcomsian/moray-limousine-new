
let edit_url = editUrl();


$(document).ready(function () {

    $('.myTable').dataTable({
        responsive : true
    });

   $('input[name="start_time"]').wickedpicker();
   $('input[name="end_time"]').wickedpicker();

       $('.wickedpicker__controls__control-down').html('<i class = "fa fa-arrow-down"></i>');
       $('.wickedpicker__controls__control-up').html('<i class = "fa fa-arrow-up"></i>');
       $('.wickedpicker__title').addClass('bg-dark text-white');

});


$('#discount_rate').change(
    function(){
        if (this.checked) {
            $('.price-up-rate').hide();
            $('.discount-rate').show();
            $('input[name="price_up_rate"]').val(null);
            $('#price_up_rate').prop('checked', false);
        }
    });
$('#price_up_rate').change(
    function(){
        if (this.checked) {
            $('.discount-rate').hide();
            $('.price-up-rate').show();
            $('input[name="discount_rate"]').val(null);
            $('#discount_rate').prop('checked', false);
        }
    });



$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('body').on('click' ,'.edit-rates',function () {
    let id = $(this).attr('id');
    editDiscount(id);
    $('#myModal').modal('toggle');
});

function editDiscount(id){
    $.ajax({
        type: 'get',
        url: edit_url+id,
        success: function (response) {
        let discount = response.discount;
        console.log(discount);
        $('input[name="id"]').val(id);
        $('select[name="category_id"]').val(discount.category_id).change();
        $('input[name="start_date"]').val(discount.start_date);
        $('input[name="end_date"]').val(discount.end_date);
        $('input[name="start_time"]').val(discount.start_time);
        $('input[name="end_time"]').val(discount.end_time);
        $('input[name="price_up_rate"]').val(discount.price_up_rate);
        $('input[name="discount_rate"]').val(discount.discount_rate);
    }
});
}
$('body').on('click' ,'.create-discount',function () {
    onCreateClick();
});

function onCreateClick() {
    $('input[name="id"]').val(null);
    $('input[name="category_id"]').val(null);
    $('input[name="start_date"]').val(null);
    $('input[name="end_date"]').val(null);
    $('input[name="start_time"]').val(null);
    $('input[name="end_time"]').val(null);
    $('input[name="price_up_rate"]').val(null);
    $('input[name="discount_rate"]').val(null);
}

$('#discounts_table').DataTable();
