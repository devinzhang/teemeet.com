
$(document).ready(function() {
    
      
   $('a.delete-greeting-link').click(function(){
     var id = $(this).attr('id');
     var li= '#greeting-entry-' + id;
     $(li).css('background-color','#fee');
     $("#dialog").dialog({
      buttons : {
        "Confirm" : function() {          
           $(this).dialog("close");
          $(li).hide('slow').empty();
        },
        "Cancel" : function() {
          $(this).dialog("close");
          $(li).css('background-color','#fff');
        }
      }
    });
     $("#dialog").dialog("open");

      
    return false; 
    });
});

