
function getErrorHtml(elemErrors, id) {
    if ((typeof (elemErrors) === 'undefined') || (elemErrors.length < 1))
        return;
    var out = '<ul class="errors" id="_' + id + '">';
    for (var i = 0; i < elemErrors.length; i++) {
        out += '<li>' + elemErrors[i] + '</li>';
    }
    out += '</ul>';
    return out;
}

function doElemValidation(id, actionUrl, formId) {

    var formElems;

    function addFormToken() {
        var tokenVal = $("#" + formId + " input[name=_token]").val();
        formElems.append('_token', tokenVal);
    }

    function sendAjaxReq() {
        $.ajax({
            type: 'POST',
            url: actionUrl,
            data: formElems,
            dataType: "json",
            error: function (data) {
                if (data.status === 422) {
                    var errMsgs = JSON.parse(data.responseText);
                    $("#" + id).parents('#fieldset-block').find("#_" + id).html(' ');
                    $("#" + id).parents('fieldset').after(getErrorHtml(errMsgs[id], id));
                }
            },
            contentType: false,
            processData: false
        });
    }

    var elem = $("#" + formId + " :input[name=" + id + "]");
    if (elem.attr('type') === 'file') {
    // elemento di input type=file valorizzato
        if (elem.val() !== '') {
            inputVal = elem.get(0).files[0];
        } else {
            inputVal = new File([""], "");
        }
    } else {
        // elemento di input type != file
        inputVal = elem.val();
    }
    formElems = new FormData();
    formElems.append(id, inputVal);
    addFormToken();
    sendAjaxReq();

}

function doFormValidation(actionUrl, formId) {

    var form = new FormData(document.getElementById(formId));
    $.ajax({
        type: 'POST',
        url: actionUrl,
        data: form,
        dataType: "json",
        error: function (data) {
            if (data.status === 422) {
                var errMsgs = JSON.parse(data.responseText);
                $.each(errMsgs, function (id) {
                    $("#" + id).parents('#fieldset-block').find("#_" + id).html(' ');
                    $("#" + id).parents('fieldset').after(getErrorHtml(errMsgs[id], id));
                });
            }
            if (data.status === 500) {
                console.log(data.responseText);
            }
        },
        success: function (data) {
            window.location.replace(data.redirect);
        },
        contentType: false,
        processData: false
    });
}
        
        
// jQuery per (dis)abilitare i campi non relativi all'opzione
function disableFields() {
    $('input[type=radio][name=tipologia]').on('change', function() {
        var choice = $('input[type=radio][name=tipologia]:checked').val();
        var apartment_filter = $('[id=appartamento]').find('input');
        var bedplace_filter = $('[id=postoletto]').find('input');
        
        switch (choice) { 
	case '0': 
		apartment_filter.prop('disabled', false);
                bedplace_filter.prop('disabled', true);
                bedplace_filter.val(null);
                $('#_sup_camera').html(' ');
                $('#_posti_camera').html(' ');
		break;  
        case '1': 
		apartment_filter.prop('disabled', true);
                bedplace_filter.prop('disabled', false);
                apartment_filter.val(null);
                $('#_sup_appartamento').html(' ');
                $('#_num_camere').html(' ');
		break; 
        }
        
    });
};

// Reset dei campi della form
function resetFields(){
    $('#resetButton').on('click', function(){
        $('#insertoffer').trigger('reset');
        $('input[type=radio][name=tipologia]').trigger('change');
        $('.errors').html(' ');
    });
};

$(document).ready(disableFields);
$(document).ready(resetFields);
