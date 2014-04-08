jQuery(function($) {

	$('.togglemenu').click(function(){
        $('.toggler').slideToggle();
        $('.menu-up').toggleClass('down');
    });

});