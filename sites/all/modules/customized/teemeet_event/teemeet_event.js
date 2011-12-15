$(document).ready(function() {   
	$('div.togglee').hide();
	$('img.open').hide();
	 
    $(".toggler").click(function () {		
        $(this).next('div.togglee').toggle("slow");
		
		
	/*	if(closed){
		   $(this).next('div.togglee').removeClass('D_swap_in')
			.addClass('D_swap_out');
			closed=false;
			$(this).children('.D_icon img.D_swap_out').hide();
			$(this).children('.D_icon img.D_swap_in').show();
		    
		
		//	$("a#lma-suggest").html('NO Thanks');
        }else{
			closed=true;
           $(this).next('.togglee').removeClass('D_swap_out')
			.addClass('D_swap_in');
			$(this).children('.D_icon img.D_swap_in').hide();
			$(this).children('.D_icon img.D_swap_out').show();
		  
			
        }
		*/
		 
        
        return false; 
    }); 
        
   

});

