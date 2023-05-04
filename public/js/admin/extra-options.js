let urls = getURL();
let adminUrl = urls[0];
let optionsDetailsUrl = urls[1];
let u_id = urls[2];
let img_path = urls[3];
let image_path_url = urls[4];



let is_quantity = $('input[name="is_quantity"]');
$(document).ready( function () {
    $('#location').chosen({
        'placeholder_text_multiple': 'Select Categories'
    });
    $('#datatable-buttons').DataTable({
        responsive : true
    });
    $('.max_quantity').hide();
    is_quantity.val('no');
} );

is_quantity.change(function () {
    if (is_quantity.is(':checked') ){
        is_quantity.val('yes');
    }else{
        is_quantity.val('no');
    }
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



//function for Edit the Option
$('body').on('click' ,'.edit-btn',function () {
    let updateURL  = adminUrl;
    let $id = $(this).attr('id');
    console.log('i am here and this is id'+$id);
    editOptions(updateURL, $id);
    $('input[name="image_name"]').removeAttr('required');
    $('#add-driver-modal').modal('toggle');
});

$('body').on('click','.options-details', function () {
    let updateURL  = optionsDetailsUrl;
    let $id = $(this).attr('id');
    optionDetails(updateURL,$id , image_path_url);
    // $('#myModal').modal('toggle');
});

$('body').on('click','.btn-create-option', function (){
    $('input[name = title]').val(null);
    $('input[name = price]').val(null);
    $('input[name = category_id]').val(null);
    $('input[name = max_quantity]').val(null);
    $('input[name = is_quantity]').prop('checked', false);
    $('input[name = id]').val(null);
    $('textarea[name = description]').val(null);
    $('.max_quantity').hide();
    // $('#output').attr('src', img+option.image_name);
    // $('#add-driver-modal').toggle();
    $('#add-driver-modal').modal('toggle');
    $('#output').attr('src',img_path);
    $('input[name="image_name"]').attr('required','required');


});

$('input[name = is_quantity]').change(function () {
    if ($(this).prop('checked')) {
        $('.max_quantity').show();
    }else {
        $('.max_quantity').hide();
    }
});


function editOptions(updateUrl,id){
    let user_id = parseInt(u_id);
    let img = image_path_url;
    let cat_data =[];
    $.ajax({
        type: 'get',
        url: updateUrl+id,
        success: function (response) {
            let option = response.option;
            let categories = response.categories;
            console.log(categories);
            $('input[name = title]').val(option.title);
            $('input[name = price]').val(option.price);
            $('input[name = category_id]').val(option.category_id);
            $('input[name = max_quantity]').val(option.max_quantity);
            $('input[name = id]').val(id);
            $('textarea[name = description]').val(option.description);
            $('#output').attr('src', img+option.image_name);
            for (let x = 0; x < categories.length ; x++){
                $('.dashboardcode-bsmultiselect ul').append('<li class="badge" style="padding-left: 0px; line-height: 1.5em;"><span>test Premium</span><button aria-label="Close" tabindex="-1" type="button" class="close" style="float: none; font-size: 1.5em; line-height: 0.9em;"><span aria-hidden="true">×</span></button></li>')
            cat_data[x] = categories[x].id;
            }
             $('#location').val(cat_data).trigger("chosen:updated");
            $('#output').removeAttr('required');
        }
    });
}

// detals View
function optionDetails(updateUrl,id , img){
    let user_id = parseInt(u_id);
    $.ajax({
        type: 'get',
        url: updateUrl+id,
        success: function (response) {
            let option = response;
            console.log('here i am');
            console.log(option);
            $('.o-title').html(option.option.title);
            $('.o-price').html(option.option.price);
            $('.o-max-quantity').html(option.option.max_quantity);
            $('.is_quantity').html(option.option.is_quantity);
            $('.extra-information').html(option.option.description);
            $('.active-status').html(option.option.is_active);
            $('#optionImg').attr('src', img+option.option.image_name);
            $('button[name = btnAddMore]').attr('id',option.option.id);
            // $('#add-driver-modal').toggle();
            let cat_length = option.categories.length;
            $('.o-information').html(null);
            for(let i = 0; i < cat_length ; i++ ){
                let counter = i + 1;
                $('.o-information').append(' <li class="list-group-item text-danger"><span> '+counter+' : </span>'+option.categories[i].name+'</li>');
            }
            $('#myModal').modal('toggle');
        }
    });
}
