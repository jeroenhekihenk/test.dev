jQuery(function($) {

	$('.togglemenu').click(function(){
        $('.toggler').slideToggle();
        $('.menu-up').toggleClass('down');
    });

	$('div.blok.blogpost > p.post-body').each(function(){
		$(this).text($(this).text().substring(0,138)+'...');
	});

});