
$(document).ready(function() {
   $('#D_photoGallery_orgControls, #D_photoGallery_movePhotoControl, .D_photoShare').hide();
   var seq = 0; 
   
   $("#D_photoViewer").jCarouselLite({
        btnNext: "#D_photoGallery_actions .next",
        btnPrev: "#D_photoGallery_actions .prev",
        visible: 1,
        speed: 800,
        circular: false,   
        
        afterEnd: function(a) {
          var $img = $(a).children('img');
          $("#sequence").html($img.attr('seq'));
          $.ajax({
	            url: $img.attr('link'),
	            type: "GET", 
	            dataType: "json",	  
                async: true,                
	            timeout: 9000, 
	            error: function(xhr, status, error){
	                // alert('status=' + xhr.statusText + '   status=' + status + '  error=' + error);
	                   wait = true; 
	                    },
	            success: function(data){  
                    if(data.status) {
                    $("#edit-pid").val(data.node.nid);
                    $("#edit-album-thumbnail").attr('checked', data.set_form.is_ablum_thumbnail);;
                    $("#edit-group-cover").attr('checked', data.set_form.is_group_photo);;
                    
                    
                    }
                    
	                if(data.title==''){
                        $("#node-title-ctrl").html('Add Caption');
                        $("#D_photoGallery_photoCaption a").remove();
                    }else{
                       $("#D_photoGallery_photoCaption").html(data.title);
                    }
                    
                    }               
			}); 
          
        }

    });
    
   $("a[rel='example1']").colorbox({transition:"fade"});
    

    $("#D_photoGallery_orgControlsWrapper a").click(function(){
        
        $('#photo_controls').slideDown('slow', function() {
            // Animation complete.
        })
        return false;
    });
    
    $("A#close-set-photo").click(function(){
            $('#photo_controls').slideUp('slow', function() {
                // Animation complete.
            });
            return false;
    });
    
    
    
    
    
});

