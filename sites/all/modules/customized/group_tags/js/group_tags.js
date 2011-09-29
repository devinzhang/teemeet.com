$(document).ready(function() {
   	
	$(".action-delete").click(function(){
		var $topic = $(this).parents('.D_group-topic');
		var topicIndex= $topic.attr('id').substr(5);
		$(this).parents('.T_chunky-ui-thing')
			.empty()
			.addClass('D_topic-empty')
			.append('<div class="chunky-thing-body"><div class="topic-field">'
	+ '<div id="edit-group-tag-'+ topicIndex +'-wrapper" class="form-item">'
	+ '<input type="text" class="form-text form-autocomplete" value="" size="50" id="edit-group-tag-'+ topicIndex +'" name="group_tag_'+topicIndex+'" maxlength="128" autocomplete="OFF">'
	+ '</div>'
	+ '<input type="hidden" disabled="disabled" value="http://127.0.0.1:8888/teemeet.com/taxonomy/autocomplete/3" id="edit-group-tag-'+topicIndex+'-autocomplete" class="autocomplete autocomplete-processed">'
	+ '<div style="" class="limit-container"><span class="limit">Up to 50 characters.</span></div>'
	+ '</div></div>');
		
	});   
	
	$(".add-topic a").click(function(){
	var $topicSugg = $(this).parents('.topic-sugg');
	var tag_value =$topicSugg.children('.topic-sugg-body').children('.topic-name').html(); 
	$(".D_topic-empty:first input").val(tag_value).parents(".T_chunky-ui-thing").removeClass('D_topic-empty');
	$topicSugg.hide();
	return false; 
	});
    
});

