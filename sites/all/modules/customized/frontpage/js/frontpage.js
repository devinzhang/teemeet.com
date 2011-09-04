
$(document).ready(function() {
   
    $('#frontpage-top-right-menu').superfish({
      // Apply a generic hover class.
      hoverClass: 'over',
      delay:       1000,                            // one second delay on mouseout 
      animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation 
      speed:       'fast',                          // faster animation speed 
      autoArrows:  false,                           // disable generation of arrow mark-up 
      dropShadows: false 
    }).find('ul').bgIframe({opacity:false});
   
});

