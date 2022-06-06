// Esegue il toggle della sezione filtri
function toggleFaqs() {
    $(".domanda").click(function (event) {

        var att = $(this).next('.risposta');
            $(this).siblings('.risposta').not(att).slideUp(500);
            att.slideToggle(500);      
    });
    $('.buttonid').click(function (e) {
        e.stopPropagation();
    });
}
;
function removeFaq() {
    $('.confirmation').on('click', function () {
        return confirm('Sei sicuro di continuare?');
    });
}
;



$(document).ready(toggleFaqs);
$(document).ready(removeFaq);



