
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
        doElemValidation(formElementId, formId);
    });
    $('[id^="form"]').on('submit', function (event) {
        event.preventDefault();
        var formId = 'form_' + userId;
        doFormValidation(formId);
    });
}

// AJAX per validare la textarea
function doElemValidation(id, formId) {

    var formElems;
    
    var elem = $("#" + formId + " :input[id=" + id + "]");
    var inputName = elem.attr('name');
    var inputVal = elem.val();

    function addFormToken() {
        var tokenVal = $("#" + formId + " input[name=_token]").val();
        formElems.append('_token', tokenVal);
    }

    function sendAjaxReq() {
        $.ajax({
            type: 'POST',
            url: $(location).attr("href") + '/message',
            data: formElems,
            dataType: "json",
            error: function (data) {
                if (data.status === 422) {
                    var errMsgs = JSON.parse(data.responseText);
                    $("#" + id).parent().find('.chat-errors').html(' ');
                    $("#" + id).after(getErrorHtml(errMsgs[inputName]));
                }
                if (data.status === 500) {
                    console.log(data.responseText);
                }
            },
            contentType: false,
            processData: false
        });
    }
    
    formElems = new FormData();
    formElems.append(inputName, inputVal);

    addFormToken();
    sendAjaxReq();

}

// AJAX per inserire un nuovo messaggio
function doFormValidation(formId) {
    
    var form = new FormData(document.getElementById(formId));
    form.append('destinatario_id', userId);
    var messageBox = $("#message_"+ userId);
    
    $.ajax({
        type: 'POST',
        url: $(location).attr("href") + '/message',
        data: form,
        dataType: "json",
        error: function (data) {
            if (data.status === 422) {
                var errMsgs = JSON.parse(data.responseText);
                messageBox.parent().find('.chat-errors').html(' ');
                messageBox.after(getErrorHtml(errMsgs['contenuto']));
            }
            if (data.status === 500) {
                console.log(data.responseText);
            }
        },
        success: function (jsonData) {
            playMessageSentAudio();
            messageBox.val('');
            var timestamp = jsonData.timestamp;
            timestamp = timestamp.substring(0,10) + ', alle ' + timestamp.substring(11);
            updateChat(timestamp, jsonData.contenuto);
            scrollChatToBottom();
            updateMessageCounter();
        },
        contentType: false,
        processData: false
    });
}


// Formatta gli errori
function getErrorHtml(elemErrors) {
    if ((typeof (elemErrors) === 'undefined') || (elemErrors.length < 1))
        return;
    var out = '<ul class="chat-errors">';
    for (var i = 0; i < elemErrors.length; i++) {
        out += '<li>' + elemErrors[i] + '</li>';
    }
    out += '</ul>';
    return out;
}

// Aggiunge un messaggio alla chat
function updateChat(timestamp, contenuto) {
    currentChat.find('#chat').append(
            '<li class="me">\n\
                <div class="entete">\n\
                    <h2>(Non visualizzato)</h2>\n\
                    <h3>' + timestamp + ' - </h3>\n\
                    <h2>Tu</h2>\n\
                    <span class="status blue"></span>\n\
                </div>\n\
                <div class="triangle"></div>\n\
                <div class="message">' + contenuto + '</div>\n\
            </li>'
    );
}

// Aggiorna il contatore dei messaggi della chat
function updateMessageCounter() {
    var headerSubtitle = currentChat.find('#counter')[0];
    var counter = headerSubtitle.innerHTML.split(" ")[1];
    counter = ++counter;
    headerSubtitle.innerHTML = "Già " + counter + " messaggi"; 
}

// Mostra un popup con maggiori dettagli sull'utente
function togglePopUp() {
    $('#profile-details').hover(function() {
        $('#pop').toggle();
    });
};

// Fa lo scroll verso il basso della chat
function scrollChatToBottom() {
    var currentChatContent = currentChat.find('#chat');
    currentChatContent.scrollTop(currentChatContent.prop("scrollHeight"));
}

// Esegue il file audio del messaggio inviato
function playMessageSentAudio() {
    var audioPath = $(location).attr("href") + '/../../public/assets/audio/message-sent.mp3'; 
    var audio = new Audio(audioPath);
    audio.play();
}

// Mostra la conversazione selezionata
function showCurrentChat() {
    $('[id^="convListElem"]').on('click', function() {
        if(currentSelectedConv !== null) {
            if(userId !== 'default') {
                updateUnreadMessages();
            }
            currentSelectedConv.removeClass('clicked');
            currentChat.addClass('hidden');
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

// Aggiorna lo status di visualizzazione dei messaggi
function updateUnreadMessages() {
    var form;

    function addFormToken_2() {
        var tokenVal = $("#form_" + userId + " input[name=_token]").val();
        form.append('_token', tokenVal);
    }
    function updateVisuals(currentChat, currentSelectedConv) {
        currentChat.find('#unread').remove();
        currentSelectedConv.find('#unreadNotifier')[0].innerHTML =
            '<span class="status green"></span> Nessun nuovo messaggio ';
    }

    function sendAjaxReq_2() {
        var currentChat_deepCopy = $.extend(true, {}, currentChat);
        var currentSelectedConv_deepCopy = $.extend(true, {}, currentSelectedConv);
        $.ajax({
            type: 'POST',
            url: $(location).attr("href") + '/unread',
            data: form,
            dataType: "json",
            error: function (data) {
                if (data.status === 422) {
                    console.log(data.responseText);
                }
                if (data.status === 500) {
                    console.log(data.responseText);
                }
            },
            success: function () {
                updateVisuals(currentChat_deepCopy, currentSelectedConv_deepCopy);
            },
            contentType: false,
            processData: false
        });
        
    }
    
    form = new FormData();
    form.append('userId', userId);

    addFormToken_2();
    sendAjaxReq_2();
    
}
