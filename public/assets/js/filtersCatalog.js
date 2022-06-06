
// Sposta la sezione filtri durante lo scorrimento
function scrollFilters() {
    var fixdiv = $('#fix-on-scroll'), pos = fixdiv.offset();
    var adapter = $('#filter-adapter');
    var title = $('#filter-title');
    $(window).scroll(function() { 
	if ($(this).scrollTop() >= pos.top && $(fixdiv.css('position') === 'static')) {
            fixdiv.addClass('filter-section-floating');
            adapter.removeClass('filter-hide');
            title.addClass('filter-hide');
	} else {
            fixdiv.removeClass('filter-section-floating');
            adapter.addClass('filter-hide');
            title.removeClass('filter-hide');
        };
    });
};


// Esegue il toggle della sezione filtri
function toggleFilters() {
    $('#filter-navbar').on('click', function(){
        $('#target').slideToggle(500);   
        $('.icon').toggleClass('open');
    });
    $('input[type=radio][name=tipologia]').trigger('change');
};
        
        
// jQuery per (dis)abilitare i filtri
function disableFilters() {
    $('input[type=radio][name=tipologia]').on('change', function() {
        var choice = $('input[type=radio][name=tipologia]:checked').val();
        var apartment_filter = $('[id=appartamento]').find('input');
        var bedplace_filter = $('[id=postoletto]').find('input');
        
        switch (choice) { 
	case '-1': 
		apartment_filter.prop('disabled', true);
                bedplace_filter.prop('disabled', true);
		break;
	case '0': 
		apartment_filter.prop('disabled', false);
                bedplace_filter.prop('disabled', true);
		break;  
        case '1': 
		apartment_filter.prop('disabled', true);
                bedplace_filter.prop('disabled', false);
		break; 
        }
    });
};

// Reset dei campi della form
function resetFilters(){
    $('#resetButton').on('click', function(){
        $('.filter-form').trigger('reset');
        $('input[type=radio][name=tipologia]').trigger('change');
    });
};

$(document).ready(scrollFilters);
$(document).ready(disableFilters);
$(document).ready(toggleFilters);
$(document).ready(resetFilters);


