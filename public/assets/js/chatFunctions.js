
// Variabili globali
var currentChat = null;
var currentSelectedConv = null;
var userId = null;

// Al termine del caricamento
$(document).ready(showCurrentChat);
$(document).ready(togglePopUp);
$(document).ready(sendMessage);

// Invia un messaggio
function sendMessage() {
    $('[id^="message"]').on('blur', function () {
        var formElementId = $(this).attr('id');
        var formId = 'form_' + userId;
        var actionUrl = $(formId).attr('action');
        doElemValidation(formElementId, actionUrl, formId);
    });
    $('[id^="form"]').on('submit', function (event) {
        event.preventDefault();
        var formId = 'form_' + userId;
        var actionUrl = $(formId).attr('action');
        doFormValidation(actionUrl, formId);
    });
}

// AJAX per inserire un nuovo messaggio
function getErrorHtml(elemErrors) {
    if ((typeof (elemErrors) === 'undefined') || (elemErrors.length < 1))
        return;
    var out = '<ul class="errors">';
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
                    $("#" + id).parent().find('.errors').html(' ');
                    $("#" + id).after(getErrorHtml(errMsgs[id]));
                }
                if (data.status === 500) {
                    document.write(data.responseText);
                }
            },
            contentType: false,
            processData: false
        });
    }

    var elem = $("#" + formId + " :input[id=" + id + "]");
    var inputName = elem.attr('name');
    var inputVal = elem.val();
    
    formElems = new FormData();
    formElems.append(inputName, inputVal);
    formElems.append('destinatario_id', userId);

    addFormToken();
    sendAjaxReq();

}

function doFormValidation(actionUrl, formId) {

    var form = new FormData(document.getElementById(formId));
    form.append('destinatario_id', userId);
    
    $.ajax({
        type: 'POST',
        url: actionUrl,
        data: form,
        dataType: "json",
        error: function (data) {
            if (data.status === 422) {
                var errMsgs = JSON.parse(data.responseText);
                $.each(errMsgs, function (id) {
                    $("#" + id).parent().find('.errors').html(' ');
                    $("#" + id).after(getErrorHtml(errMsgs[id]));
                });
            }
        },
        /*
        success: function (jsonData) {
            var messageTemplate = $.template(
                '<li class="me">
                                    <div class="entete">
                                            <h2>(Non visualizzato)</h2>
                                            <h3>${timestamp} - </h3>
                                            <h2>Tu</h2>
                                            <span class="status blue"></span>
                                    </div>
                                    <div class="triangle"></div>
                                    <div class="message">
                                            ${contenuto}
                                    </div>
                            </li>'
            );

            currentChat.append(messageTemplate, {
                url: jsonData.url,
                name: jsonData.name
            });
        },
         */
        contentType: false,
        processData: false
    });
}

// Mostra un popup con maggiori dettagli sull'utente
function togglePopUp() {
    $('#profile-details').hover(function() {
        $('#pop').toggle();
    });
};

// Fa lo scroll verso il basso della chat
function scrollChatToBottom() {
    currentChatContent = currentChat.find('ul');
    currentChatContent.scrollTop(currentChatContent.prop("scrollHeight"));
}

// Mostra la conversazione selezionata
function showCurrentChat() {
    $('[id^="convListElem"]').on('click', function() {
        if(currentChat !== null) {
            currentChat.addClass('hidden');
        }
        if(currentSelectedConv !== null) {
            currentSelectedConv.removeClass('clicked');
        }
        currentSelectedConv = $(this);
        currentSelectedConv.addClass('clicked');
        userId = currentSelectedConv.attr('id').substring(13);
        
        var convId = "conv_" + userId;
        currentChat = $("#" + convId);
        
        currentChat.removeClass('hidden');
        scrollChatToBottom();
    });
}

