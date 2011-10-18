// JavaScript Document
if(Drupal.jsEnabled) {	
	$(document).ready(function(){
	 
     $(".editable_member_title").editInPlace({     
      url: "http://www.7452.org/tuyaqiang/ajax/save_answer",
      params: "uid=0",
      default_text:"", 
      });
      
      
	})
}

