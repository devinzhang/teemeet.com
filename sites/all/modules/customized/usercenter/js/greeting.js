
$(document).ready(function() {
    
      
   $('a.delete-greeting-link').click(function(){
     var id = $(this).attr('id');
     var li= '#greeting-entry-' + id;
     var link = $(this).attr('href');
     $(li).css('background-color','#fee');
     $("#dialog").dialog({
      buttons : {
        "Confirm" : function() {
           $.ajax({
	            url: link,
	            type: "GET", 
	            dataType: "json",	  
                async: true,                
	            timeout: 9000, 
	            error: function(xhr, status, error){	                
	                    },
	            success: function(data){   
	               $(li).hide('slow').empty();
	            }                
			}); 
             $(this).dialog("close");
        },
        "Cancel" : function() {
          $(this).dialog("close");
          $(li).css('background-color','#fff');
        }
      },
      close: function(event, ui) {$(li).css('background-color','#fff'); }     
    });
     $("#dialog").dialog("open");

      
    return false; 
    });
});

