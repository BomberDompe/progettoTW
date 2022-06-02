// Esegue il toggle della sezione filtri
function toggleOffers() {
    $('.element-list').click(function () {
        var next = $(this).next('.offerta');
        $(this).siblings('.offerta').not(next).slideUp(500);
        next.slideToggle(500);
    });
}
;

$(document).ready(toggleOffers);



