$(document).ready(function () {
    let wrapperNumber = 1;
    // add-price-fields
    $(document).on('click', '.add-price-fields', function (e) {
        let priceUnit = $(this).attr('data-price-unit');
        let priceContainer = $(this).parents('.text').siblings('.price-container');

        let formData = {
            'number': wrapperNumber,
            'unit': priceUnit
        };

        // get price fields from server
        $.get(routePricingFields,
            formData,
            function (data, status) {
                if (status === 'success') {
                    let lastWrapper = $(priceContainer).find('.price-wrapper.last');

                    $(lastWrapper).removeClass('last');
                    $(priceContainer).append(data);
                    wrapperNumber++;
                }
            }
        );
    });


    // if is_price_fixed checked
    $(document).on('change', '.is_price_fixed' , function (e) {
        let parent = $(this).parents('.price-wrapper');
        if ($(this).is(':checked')){
            $(parent).find('label.price').text('Fixed Price: ');
            $(this).siblings('input').val('1');
        }else {
            $(parent).find('label.price').text($(this).attr('data-unit'));
            $(this).siblings('input').val('0');
        }
    });

    $(document).on('submit', '.add-new-price-form', function (e) {
        if (!isDataValid($(this))){
            e.preventDefault();
        }
    })

});


// data
/**
 *
 * @param form
 * @returns {boolean}
 */
function isDataValid(form) {
    let isValid = true;
    let fields = $(form).find('.need-validation');
    $('.invalid-feedback').hide();
    $(fields).each(function () {
        if ($(this). val() === '' || $(this). val() < 0){
            isValid = false;
            $(this).siblings('.invalid-feedback').html('Valid value required').show();
        }

    });
    let isSequenceCorrect = checkPriceFieldsSequence(form);
    return isValid && isSequenceCorrect;
}

/**
 *
 * @param form
 * @returns {boolean}
 */
function checkPriceFieldsSequence(form) {
    let isValid = true;
    let fromFields = $(form).find('input.from');
    let toFields = $(form).find('input.to');

    for (let i = 0; i < fromFields.length; i++){
        if (parseFloat($(toFields).eq(i).val()) > parseFloat($(fromFields).eq(i+1).val())){
            isValid = false;
            $(fromFields).eq(i+1).siblings('.invalid-feedback').html('From price should be greater than or equal to previous To price').show();
        }
        if (parseFloat($(toFields).eq(i).val()) <= parseFloat($(fromFields).eq(i).val())){
            isValid = false;
            $(toFields).eq(i).siblings('.invalid-feedback').html('To price should be greater than From price').show();
        }
    }

    return isValid;
}