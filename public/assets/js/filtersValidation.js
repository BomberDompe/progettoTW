/*    
 * 
$(function () {
    $(':input').on('change', function () {
        var element = $(this);
        element.removeClass('validation-error');
        var patternInteger = /^([0-9.\,])+$/;
        var patternUnsigned = /^([0-9])+$/;
        var patternDate = /^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/;
        switch (element.attr('name')) {
            case 'min_price':
                if (element.val().length !== 0 &&
                        !patternInteger.test(element.val())) {
                    element.addClass('validation-error');
                }
                break;
            case 'max_price':
                if (element.val().length !== 0 &&
                        (!patternInteger.test(element.val()) ||
                        element.val() < $('[id=min_price]').val() ||
                        element.val() > 9999)) {
                    element.addClass('validation-error');
                }
                break;
            case 'start_date':
                if (element.val().length !== 0 && 
                        (!patternDate.test(element.val()) ||
                        element.val() <= new Date())) {
                    element.addClass('validation-error');
                }
                break;
            case 'end_date':
                if (element.val().length !== 0 && 
                        (!patternDate.test(element.val()) ||
                        element.val() < $('[id=start_date]').val() ||
                        element.val() > date('2100-01-01'))) {
                    element.addClass('validation-error');
                }
                break;
            case 'sup_appartamento':
                if (element.val().length !== 0 &&
                        (!patternUnsigned.test(element.val()) ||
                        element.val() > 999)) {
                    element.addClass('validation-error');
                }
                break;
            case 'sup_camera':
                if (element.val().length !== 0 &&
                        (!patternUnsigned.test(element.val()) ||
                        element.val() > 999)) {
                    element.addClass('validation-error');
                }
                break;
            case 'num_camere':
                if (element.val().length !== 0 &&
                        (!patternUnsigned.test(element.val()) ||
                        element.val() > 99)) {
                    element.addClass('validation-error');
                }
                break;
            case 'posti_tot':
                if (element.val().length !== 0 &&
                        (!patternUnsigned.test(element.val()) ||
                        element.val() > 99)) {
                    element.addClass('validation-error');
                }
                break;
            case 'posti_camera':
                if (element.val().length !== 0 &&
                        (!patternUnsigned.test(element.val()) ||
                        element.val() > 99)) {
                    element.addClass('validation-error');
                }
                break;
        };
    });

    $('form').on('submit', function () {
        $(':input').trigger('change');
        if ($(':input').filter('[class*=validation-error]').length !== 0) {
            return false;
        };
    });
});
 *
 */        