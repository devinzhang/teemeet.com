
$(document).ready(function() {
    
    var editLink = $(".editable_member_title").attr('link');
    $(".editable_member_title").editInPlace({     
      url: editLink,
      params: "title=0",
      default_text:"", 
      });
      
      
   $('#block-usercenter-0 li:first').addClass('select');
    $('#block-usercenter-0 a').click(function(){
    $(this).parent().addClass('select');
    });
});

