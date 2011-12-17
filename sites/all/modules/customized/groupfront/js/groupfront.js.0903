// $Id: nice_menus.js,v 1.21 2010/06/18 06:14:12 vordude Exp $

// This uses Superfish 1.4.8
// (http://users.tpg.com.au/j_birch/plugins/superfish)

// Add Superfish to all Nice menus with some basic options.

$(document).ready(function() {
   jQuery('ul.sf-menu').superfish();
   var closed = true;
   $("a#lma-suggest").click(function () {
        $("#meetup-suggestion").toggle("slow");
        if(closed){
        $(this).removeClass('push_wh');
        $(this).addClass('cancel_wh');
        closed=false;
        $("a#lma-suggest").html('NO Thanks');
        }else{
         closed=true;
            $(this).removeClass('cancel_wh');
            $(this).addClass('push_wh');
          $("a#lma-suggest").html('SUGGEST A NEW MEETUP');
        }
        
       
        
        return false; 
    }); 
        
     /*loadding content for each group hoem tab*/
     
     
        $('a#mitmTab, a#upcomingTab').click(function(){
        $('#ajax-loader').show();
        $('#ajax-container').addClass('black_overlay').load($(this).attr('href'), '',function(){
        $('#ajax-loader').hide();
        $('#ajax-container').removeClass('black_overlay');
        
        });
        $('li.selected').removeClass('selected');
        $(this).parent().addClass('selected');
        return false;
        })

});

