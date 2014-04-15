jQuery(function($) {



	$(document).ready(function()
	{

$('div.ohoh-left,div.ohoh-right').fadeIn(750);


		$('h3.ohoh').append('4').delay(1000).queue(
			function (next)
			{
    		$(this).append('0').delay(750).queue(
    			function (next) 
    			{ 
    			$(this).append('4').delay(500).queue(
    				function (next) 
    				{
    					next()
    				});
    			next()
    		});
			next()
		});



	});

$('a.ohoh').hover(
	function()
	{
		$('span.arrow-right').css({'margin-right':'20px','transform':'rotateY(90deg)','-webkit-transform':'rotateY(90deg)','-ms-transform':'rotateY(90deg)'});
		$('div.rabbit,div.clouds').css('transform','scale(1.5)');
	},
	function() 
	{
		$('span.arrow-right').css({'margin-right':'10px','transform':'rotateY(0deg)','-webkit-transform':'rotateY(0deg)','-ms-transform':'rotateY(0deg)'});
		$('div.rabbit,div.clouds').css('transform','scale(1.0)');
	});
});