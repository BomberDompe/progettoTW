// Esegue il toggle della sezione filtri
function toggleOffers() {
    $(".element-list").click(function (event) {

        var att;
        if ($(event.target).hasClass('proposte')) {

            att = $(this).next().next('.prop');
            $(this).siblings('.prop').not(att).slideUp(500);
            $(this).siblings('.offerta').slideUp(500);
            att.slideToggle();

        } else {
            att = $(this).next('.offerta');
            $(this).siblings('.offerta').not(att).slideUp(500);
            $(this).siblings('.prop').slideUp(500);
            att.slideToggle(500);
        }
    });
    $('.buttonid').click(function (e) {
        e.stopPropagation();
    });
}
;
function removeOffers() {
    $('.confirmation').on('click', function () {
        return confirm('Sei sicuro di continuare?');
    });
}
;
function proposteEmpty() {
    $('[id = "proposta"]').each(function () {
        if ($(this).children().size() === 0) {
            $(this).append('<div class="col-md-12">\n\
                            <p class="nada_prop">Nessuna proposta</p>\n\
                            </div>');
        }
    });


}
$(document).ready(toggleOffers);
$(document).ready(removeOffers);
$(document).ready(proposteEmpty);




