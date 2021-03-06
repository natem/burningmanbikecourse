/**
 * @file
 * Custom JS.
 */

(function ($) {
    $(document).ready(function(){


        // slideshow on custom landing page 


    var InfiniteRotator =
        {
            init: function()
            {
                //initial fade-in time (in milliseconds)
                var initialFadeIn = 1000;
     
                //interval between items (in milliseconds)
                var itemInterval = 5000;
     
                //cross-fade time (in milliseconds)
                var fadeTime = 0;
     
                //count number of items
                var numberOfItems = $('.rotating-item').length;
     
                //set current item
                var currentItem = 0;
     
                //show first item
                $('.rotating-item').eq(currentItem).fadeIn(initialFadeIn);
     
                //loop through the items
                var infiniteLoop = setInterval(function(){
                    $('.rotating-item').eq(currentItem).fadeOut(fadeTime);
     
                    if(currentItem == numberOfItems -1){
                        currentItem = 0;
                    }else{
                        currentItem++;
                    }
                    $('.rotating-item').eq(currentItem).fadeIn(fadeTime);
     
                }, itemInterval);
            }
        };
     
        InfiniteRotator.init();

    });
		
})(jQuery);
