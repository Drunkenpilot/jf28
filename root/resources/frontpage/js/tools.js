//////////////////////////////////////////////////
/* Utilitaire for Beta-Gallery of betalife      */
/* Authority: Hao Zhenyu | Beta Life @ Brussels */
/* Year 2013                                    */
//////////////////////////////////////////////////



    // All images need to be loaded for this plugin to work so
    // we end up waiting for the whole window to load in this example
$(window).load(function(){
	  $winWidth = $(window).width(); 

$(function(){
	 if($winWidth<767){
		 collage_sm();
         $('.Collage_sm').collageCaption();
	 }else{       	
            collage();
            $('.Collage').collageCaption();
	 }
            
});
});



    // Here we apply the actual CollagePlus plugin
    function collage() {
        $('.Collage').removeWhitespace().collagePlus(
            {
                'fadeSpeed'     : 500,
                'targetHeight'  : 200,
                'allowPartialLastRow' : true
            }
        );
    };
    
    function collage_sm(){
    	 $('.Collage_sm').removeWhitespace().collagePlus(
    	            {
    	                'fadeSpeed'     : 500,
    	                'targetHeight'  : 200,
    	                'allowPartialLastRow' : true
    	            }
    	        );
    }
    // This is just for the case that the browser window is resized
    var resizeTimer = null;
    $(window).bind('resize', function() {
        // hide all the images until we resize them
        $('.Collage .Image_Wrapper').css("opacity", 0);
        $winWidth = $(window).width(); 
        if($winWidth<767){
        	location.reload();
   	 }
        // set a timer to re-apply the plugin
        if (resizeTimer) clearTimeout(resizeTimer);
        resizeTimer = setTimeout(collage, 200);
    });