jQuery(function($) {

	$('.togglemenu').click(function(){
        $('.toggler').slideToggle();
        $('.menu-up').toggleClass('down');
    });

	$('div.blok.blogpost > p.post-body').each(function(){
		$(this).text($(this).text().substring(0,135)+'...');
	});

	$(".prev").on("click", function () {
        $(".prev").animate({
            left: "-1.65%"
        }, 300)
        .animate({
            left: "-1.85%"
        }, 300);
    });
    $(".next").on("click", function () {
        $(".next").animate({
            right: "-1.65%"
        }, 300)
        .animate({
            right: "-1.85%"
        }, 300);
    });

        // Only run everything once the page has completely loaded
$(window).load(function(){

    // Set general variables
    // ====================================================================
    var totalWidth = 0;

    // Total width is calculated by looping through each gallery item and
    // adding up each width and storing that in `totalWidth`
    $(".blok").each(function(){
        totalWidth = totalWidth + $(this).outerWidth(true);
    });

    // The maxScrollPosition is the furthest point the items should
    // ever scroll to. We always want the viewport to be full of images.
    var maxScrollPosition = totalWidth - $("div.feed > div.feed").outerWidth();

    // This is the core function that animates to the target item
    // ====================================================================
    function toGalleryItem($targetItem){
        // Make sure the target item exists, otherwise do nothing
        if($targetItem.length){

            // The new position is just to the left of the targetItem
            var newPosition = $targetItem.position().left;

            // If the new position isn't greater than the maximum width
            if(newPosition <= maxScrollPosition){

                // Add active class to the target item
                $targetItem.addClass("blok--active");

                // Remove the Active class from all other items
                $targetItem.siblings().removeClass("blok--active");

                // Animate .gallery element to the correct left position.
                $(".b-roll").animate({
                    left : - newPosition
                });
            } else {
                // Animate .gallery element to the correct left position.
                $(".b-roll").animate({
                    left : - maxScrollPosition
                });
            };
        };
    };

    // Basic HTML manipulation
    // ====================================================================
    // Set the gallery width to the totalWidth. This allows all items to
    // be on one line.
    $(".gallery").width(totalWidth);

    // Add active class to the first gallery item
    $(".blok:first").addClass("blok--active");

    // When the prev button is clicked
    // ====================================================================
    $(".prev").click(function(){
        // Set target item to the item before the active item
        var $targetItem = $(".blok--active").prev();
        toGalleryItem($targetItem);
    });

    // When the next button is clicked
    // ====================================================================
    $(".next").click(function(){
        // Set target item to the item after the active item
        var $targetItem = $(".blok--active").next();
        toGalleryItem($targetItem);
    });
});

});